<?php

namespace App\Http\Controllers\Correios;

use Illuminate\Http\Request;
use App\Library\ShippingLibrary;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function callShipping(ShippingLibrary $correios, Request $request, $prefix, $branchId)
    {
        $ceporigen = Branch::find($branchId);

        $shipping = new ShippingLibrary();
        return $shipping->calculaterShipping(
            $ceporigen['zipcode'],
            $request->zipcode,
            $request->get('width', 16),
            $request->get('height', 16),
            $request->get('length', 16),
            $request->get('weight', 0.3),
            $request->get('quantity', 1)
        );

        //$shipping = $correios->calculaterShipping();

        return response()->json([
            'data' => [
                'shipping' => $shipping,
            ],
        ]);
    }

   
}