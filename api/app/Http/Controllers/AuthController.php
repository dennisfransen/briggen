<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserCompleteResource;
use App\Models\LinkedSocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade as PrettyResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function redirectToProvider(int $provider)
    {
        switch ($provider) {
            case 0:
                return Socialite::driver("facebook")->redirect();
            case 1:
                return Socialite::driver("twitter")->redirect();
            case 2:
                return Socialite::driver("google")->redirect();
            default:
                return PrettyResponseFacade::conditional(false, null, [
                    "error" => [
                        "code" => 500,
                        "message" => "Wrong provider provided.",
                    ]
                ]);
        }
    }

    public function facebookCallback()
    {
        return $this->providerCallback("facebook");
    }

    public function twitterCallback()
    {
        return $this->providerCallback("twitter");
    }

    public function googleCallback()
    {
        return $this->providerCallback("google");
    }

    private function providerCallback(string $providerName)
    {
        if ($providerName !== "facebook" && $providerName !== "twitter" && $providerName !== "google") {
            return PrettyResponseFacade::conditional(false, null, [
                "error" => [
                    "code" => 500,
                    "message" => "No provider provided.",
                ]
            ]);
        }

        $socialiteUser = Socialite::driver($providerName)->user();

        if ($linkedSocialAccount = $this->getLinkedSocialAccount($socialiteUser, $providerName)) {
            return $this->getLoginCallback($linkedSocialAccount->user, false, $providerName);
        }

        if ($socialiteUser->email != null) {
            $user = User::where("email", "like", $socialiteUser->email)->first();
        } else {
            $user = null;
        }

        if (!$user) {
            if ($user = User::create([
                "email" => $socialiteUser->email,
                "name" => $socialiteUser->name,
            ])) {
                LinkedSocialAccount::create([
                    "provider_id" => $socialiteUser->id,
                    "provider_name" => $providerName,
                    "user_id" => $user->id,
                ]);

                return $this->getLoginCallback($user, true, $providerName);
            }
        } else {
            LinkedSocialAccount::create([
                "provider_id" => $socialiteUser->id,
                "provider_name" => $providerName,
                "user_id" => $user->id,
            ]);

            return $this->getLoginCallback($user, false, $providerName);
        }

        return redirect(config("app.url"));
    }

    private function getLinkedSocialAccount($socialiteUser, string $provider)
    {
        return LinkedSocialAccount::where("provider_id", $socialiteUser->id)
            ->where("provider_name", $provider)
            ->first();
    }

    /**
     * @param User|null|Builder $user
     * @param bool $new_user
     * @param string $providerName
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function getLoginCallback(?User $user, bool $new_user, string $providerName = "facebook")
    {
        return redirect(config("app.url") . "/login/" . $providerName . "/callback/" . $user->id . "/" . ($new_user ? "new" : "old") . "/" . $user->getAccessToken(Str::ucfirst($providerName)));
    }

    public function facebookLogin()
    {
        return app()->handle(Request::create(route("login.facebook.redirect"), "GET"));
    }

    public function twitterLogin()
    {
        return app()->handle(Request::create(route("login.twitter.redirect"), "GET"));
    }

    public function googleLogin()
    {
        return app()->handle(Request::create(route("login.google.redirect"), "GET"));
    }

    // TODO Feature test
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if (!$client = $this->getClient()) {
            return $this->getOAuthClientNotFound();
        }

        $data = $this->getCredentials($client, ["username" => $request->email, "password" => $request->password]);

        return $this->getTokenResponse($data, 201);
    }

    // TODO Feature test

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if (!$client = $this->getClient()) {
            return $this->getOAuthClientNotFound();
        }

        $data = $this->getCredentials($client, ["username" => $request->email, "password" => $request->password]);

        return $this->getTokenResponse($data, 200);
    }

    /**
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    private function getClient()
    {
        return DB::table("oauth_clients")
            ->where("password_client", true)
            ->first();
    }

    /**
     * @return JsonResponse
     */
    private function getOAuthClientNotFound(): JsonResponse
    {
        return PrettyResponse::conditional(false, null, [
            "error" => [
                "code" => 404,
                "message" => "OAuth client not found in database.",
            ]
        ]);
    }

    /**
     * @param $client
     * @param array $request
     * @return array
     */
    private function getCredentials($client, array $request): array
    {
        return [
            "grant_type" => "password",
            "client_id" => $client->id,
            "client_secret" => $client->secret,
            "username" => $request["username"],
            "password" => $request["password"],
        ];
    }

    /**
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    private function getTokenResponse(array $data): JsonResponse
    {
        $response = app()->handle(Request::create(route("passport.token"), "POST", $data));

        if ($response->getStatusCode() == 200) {
            $user = User::where("email", "LIKE", $data["username"])
                ->first();
            return PrettyResponse::wrap(
                array_merge(json_decode($response->getContent(), true), ["user" => new UserCompleteResource($user)])
            );
        }

        return PrettyResponse::conditional(
            false,
            null,
            [
                "error" => [
                    "code" => $response->getStatusCode(),
                    "message" => "The email or password is wrong."
                ]
            ]
        );
    }

    // TODO Feature test
    /**
     * @return JsonResponse
     */
    public function logout()
    {
        $accessToken = auth()->user()->tokens()->where("revoked", false)->first();

        if (!$accessToken)
            return PrettyResponse::conditional(true);

        DB::table("oauth_refresh_tokens")
            ->where("access_token_id", $accessToken->id)
            ->update([
                "revoked" => true
            ]);

        $accessToken->revoke();

        return PrettyResponse::conditional(true);
    }
}
