<?php

namespace App\Http\Controllers;

use App\Models\Corporation;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade;
use Illuminate\Http\Request;

class CorporationController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * TODO Add request
     * TODO Add resource
     * TODO Feature test
     */
    public function store(Request $request)
    {
        $corporation = new Corporation();
        $corporation->title = $request->title;
        $corporation->save();

        return PrettyResponseFacade::conditional(true, $corporation->toArray(), [
            "success" => [
                "code" => 201
            ]
        ]);
    }

    /**
     * @param Corporation $corporation
     * @return mixed
     * TODO Add resource
     * TODO Feature test
     */
    public function show(Corporation $corporation)
    {
        return PrettyResponseFacade::wrap($corporation->load(["vouchers"])->toArray());
    }

    /**
     * @param Request $request
     * @param Corporation $corporation
     * @return mixed
     * TODO Add request
     * TODO Add resource
     * TODO Add policy
     * TODO Feature test
     */
    public function update(Corporation $corporation, Request $request)
    {
        $corporation->title = $request->title;
        $corporation->save();

        return PrettyResponseFacade::wrap($corporation->toArray());
    }
}
