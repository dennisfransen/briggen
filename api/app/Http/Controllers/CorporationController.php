<?php

namespace App\Http\Controllers;

use App\Http\Resources\CorporationResource;
use App\Models\Corporation;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade;
use Illuminate\Http\Request;

class CorporationController extends Controller
{
    public function index()
    {
        return PrettyResponseFacade::wrap(CorporationResource::collection(Corporation::all()));
    }

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
        return PrettyResponseFacade::wrap(new CorporationResource($corporation->load(["vouchers", "products"])));
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
        $corporation->description = $request->description;
        $corporation->save();

        return PrettyResponseFacade::wrap($corporation->toArray());
    }
}
