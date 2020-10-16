<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::select('SELECT a.*, b.buyer_name, b.company_name FROM orders a INNER JOIN buyers b ON b.id = a.buyer_id');
        return view('pages.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyers = DB::table('buyers')->get();
        $samples = DB::table('samples')->select('id', 'sample_name')->get();
        return view('pages.orders.create', compact('buyers', 'samples'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shipDate = $request->shipment_date;
        $ShipConvert = strtotime($shipDate);
        date_default_timezone_set('Asia/Dhaka');

        $data = [
            'buyer_id' => $request->buyer_id,
            'LC' => $request->order_lc,
            'bank' => $request->bank,
            'shipment_date' => date('Y-m-d', $ShipConvert),
            'order_date' => date('Y-m-d H:i:s'),
            'shipment_type' => $request->shipment_type
        ];

        $order_id = DB::table('orders')->insertGetId($data);

        foreach (session('cart') as $key => $details) {
            $data = [
                'order_id' => $order_id,
                'sample_id' => $key,
                'qty' => $details['qty'],
                'price' => $details['price'],
                'desc' => $details['desc']
            ];

            DB::table('order_details')->insert($data);
        }

        $notification = [
            'message'   =>  'Data successfully inserted',
            'alert-type'    =>  'success'
        ];
        session()->forget('cart');
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = DB::select("SELECT a.*, b.*, d.sample_name 
        FROM order_details a INNER JOIN orders b ON b.id = a.order_id 
        INNER JOIN samples d ON d.id = a.sample_id 
        WHERE a.order_id = '" . $id . "'");

        $buyer = DB::table('orders')->where('orders.id', $id)->join('buyers', 'orders.buyer_id', '=', 'buyers.id')->first();
        return view("pages.orders.details", compact('details', 'buyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
}
