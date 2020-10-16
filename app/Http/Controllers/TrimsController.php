<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrimsController extends Controller
{
    public function index()
    {
        $trims = DB::table('trims')->join('suppliers', 'trims.supplier_id', '=', 'suppliers.id')->get();
        $suppliers = DB::table('suppliers')->get();
        return view('pages.trims.index', compact('trims', 'suppliers'));
    }


    public function store(Request $request)
    {
        $data = [
            'trims_name' => $request->name,
            'type' => $request->type,
            'qty' => $request->qty,
            'puchase_price' => $request->price,
            'supplier_id' => $request->supplier_id,
            'created_at' => date('Y-m-d H:i:s')
        ];

        try {
            DB::table('trims')->insert($data);
            $notification = [
                'message'   =>  'Data successfully inserted',
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        } catch (\Throwable $e) {
            $notification = [
                'message'   =>  $e->getMessage(),
                'alert-type'    =>  'danger'
            ];
            return redirect()->back()->with($notification);
        }
    }


    public function dispatchTrims()
    {
        $trims = DB::table('trims')->get();
        $dispatch = DB::table('dispatch')->join('trims', 'dispatch.trims_id', '=', 'trims.id')->get();
        return view('pages.trims.dispatch', compact('trims', 'dispatch'));
    }


    public function dispatchTrimsStore(Request $request)
    {
        $Date = $request->date;
        $Convert = strtotime($Date);
        date_default_timezone_set('Asia/Dhaka');

        $data = [
            'date' => date('Y-m-d', $Convert),
            'trims_id' => $request->trims_id,
            'took_out' => $request->took,
            'purpose' => $request->purpose,
            'dispatch_qty' => $request->qty,
            'created_at' => date('Y-m-d H:i:s')
        ];

        try {
            DB::table('dispatch')->insert($data);
            $notification = [
                'message'   =>  'Data successfully inserted',
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        } catch (\Throwable $e) {
            $notification = [
                'message'   =>  $e->getMessage(),
                'alert-type'    =>  'danger'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
