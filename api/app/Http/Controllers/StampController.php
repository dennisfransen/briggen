<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use App\Models\User;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade;
use Illuminate\Http\Request;

class StampController extends Controller
{
    /**
     * @param Stamp $stamp
     * @return mixed
     * TODO Add resource
     * TODO Add policy
     * TODO Feature test
     */
    public function show(Stamp $stamp)
    {
        return PrettyResponseFacade::wrap($stamp->toArray());
    }

    public function showFirstByUser(User $user)
    {
        return PrettyResponseFacade::wrap($user->stamps[0]->toArray());
    }

    public function consume(Stamp $stamp, Request $request)
    {
        $absoluteCount = abs($request->count);

        if ($stamp->count >= $absoluteCount) {
            $stamp->count -= $absoluteCount;
            $stamp->save();

            return PrettyResponseFacade::conditional(true, $stamp->toArray());
        }

        return PrettyResponseFacade::conditional(false, $stamp->toArray(), [
            "error" => [
                "message" => "Du har inte tillräckligt med coins för att göra detta."
            ]
        ]);
    }
}
