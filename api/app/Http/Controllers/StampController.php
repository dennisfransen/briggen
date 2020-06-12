<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade;

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
}
