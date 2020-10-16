<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderInfoRequest;
use Illuminate\Support\Facades\DB;
use App\Model\Sample;

class OrderInfoController extends Controller
{
    public function getSample($id)
    {
        $price = DB::table('samples')->select('unit_price')->where('id', $id)->first();

        return response()->json($price);
    }


    public function addItem(Request $request)
    {
        $sample = Sample::find($request->sample_id);

        if (!$sample) {
            $notification = [
                'message'   =>  "Something Went Wrong!!",
                'alert-type'    =>  'warning'
            ];
            return redirect()->back()->with($notification);
        }

        $cart = session()->get('cart');

        //if cart is empty then this will be the first product
        if (!$cart) {
            $cart = [
                $request->sample_id => [
                    "name" => $sample->sample_name,
                    "qty" => $request->qty,
                    "price" => $sample->unit_price,
                    "desc" => $request->desc
                ]
            ];

            session()->put('cart', $cart);

            $notification = [
                'message'   =>  "Successfully Added!",
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        }

        //if product is already exist
        if (isset($cart[$request->sample_id])) {
            $cart[$request->sample_id]['qty'] += $request->qty;
            session()->put('cart', $cart);

            $notification = [
                'message'   =>  "Quantity Updated!",
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        }

        $cart[$request->sample_id] = [
            "name" => $sample->sample_name,
            "qty" => $request->qty,
            "price" => $sample->unit_price,
            "desc" => $request->desc
        ];
        session()->put('cart', $cart);

        $notification = [
            'message'   =>  "Successfully Added!",
            'alert-type'    =>  'success'
        ];
        return redirect()->back()->with($notification);
    }


    public function addBOM(Request $request)
    {
        $trims = DB::table('trims')->where('id', $request->trim_id)->first();

        if (!$trims) {
            $notification = [
                'message'   =>  "Something Went Wrong!!",
                'alert-type'    =>  'warning'
            ];
            return redirect()->back()->with($notification);
        }

        $bom = session()->get('bom');

        //if cart is empty then this will be the first product
        if (!$bom) {
            $bom = [
                $request->trim_id => [
                    "name" => $trims->trims_name,
                    "qty" => $request->qty,
                    "price" => $request->price,
                ]
            ];

            session()->put('bom', $bom);

            $notification = [
                'message'   =>  "Successfully Added!",
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        }


        //if product is already exist
        if (isset($bom[$request->trim_id])) {
            $bom[$request->trim_id]['qty'] += $request->qty;
            session()->put('cart', $bom);

            $notification = [
                'message'   =>  "Quantity Updated!",
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        }

        $bom[$request->trim_id] = [
            "name" => $trims->trims_name,
            "qty" => $request->qty,
            "price" => $request->price,
        ];
        session()->put('bom', $bom);

        $notification = [
            'message'   =>  "Successfully Added!",
            'alert-type'    =>  'success'
        ];
        return redirect()->back()->with($notification);
    }
}
