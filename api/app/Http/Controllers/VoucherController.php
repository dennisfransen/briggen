<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use App\Models\User;
use App\Models\Voucher;
use Fasberg\PrettyResponse\Facade\PrettyResponseFacade;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * TODO Add request
     * TODO Add resource
     * TODO Add policy
     * TODO Feature test
     */
    public function store(Request $request)
    {
        $voucher = new Voucher();
        $voucher->corporation_id = $request->corporation_id;
        $voucher->setUniqueCode();
        $voucher->value = $request->value;
        $voucher->uses = $request->uses;
        $voucher->save();

        return PrettyResponseFacade::conditional(true, $voucher->toArray(), [
            "success" => [
                "code" => 201
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     * TODO Add request
     * TODO Add policy
     * TODO Add resource
     * TODO Feature test
     */
    public function consume(Request $request)
    {
        $voucher = Voucher::where("code", $request->code)->first();

        if ($voucher) {
            $stamp = User::first()->stamps()->where("corporation_id", $voucher->corporation_id)->first();

            if (!$stamp) {
                $stamp = new Stamp();
                $stamp->user_id = User::first()->id;
                $stamp->corporation_id = $voucher->corporation_id;
                $stamp->count = 0;
                $stamp->save();
            }

            if ($stamp->count + $voucher->value < 0) {
                return PrettyResponseFacade::conditional(false, $stamp->toArray(), [
                    "error" => [
                        "message" => "Du har inte så många coins som du behöver."
                    ]
                ]);
            }

            $value = $voucher->value;
            $stamp->count += $voucher->value;
            $stamp->save();

            $voucher->uses -= 1;

            if ($voucher->uses == 0) {
                $voucher->delete();
            } else {
                $voucher->save();
            }

            return PrettyResponseFacade::conditional(true, $stamp->toArray(), [
                "success" => [
                    "message" => "Dina coins har förändrats med " . $value . "."
                ]
            ]);
        }

        return PrettyResponseFacade::conditional(false, null, [
            "error" => [
                "message" => "Koden hittades inte."
            ]
        ]);
    }
}
