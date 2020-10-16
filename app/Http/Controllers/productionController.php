<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Production;
use App\Model\ProductionDetails;
use Throwable;
use DB;

class productionController extends Controller
{
    public function index()
    {
        $productions = Production::all();
        return view('pages.productions.index', compact('productions'));
    }


    public function create()
    {
        return view('pages.productions.create');
    }


    public function store(Request $request)
    {
        $data1 = [
            'order_id' => $request->order_id,
            'po_date' => $request->po_date,
            'description' => $request->desc,
        ];
        try {
            $production = Production::create($data1);

            if ($production->id) {
                $sample_id = $request->sample_id;
                $po_qty = $request->po_qty;
                $sewing_qty = $request->sewing_qty;
                $wash_qty = $request->wash_qty;
                $finished_qty = $request->finished_qty;
                $westage = $request->westage;

                for ($i = 0; $i < sizeof($sample_id); $i++) {
                    $data2 = [
                        'po_id' => $production->id,
                        'sample_id' => $sample_id[$i],
                        'po_qty' => $po_qty[$i],
                        'sewing_qty' => $sewing_qty[$i],
                        'wash_qty' => $wash_qty[$i],
                        'finished_qty' => $finished_qty[$i],
                        'westage' => $westage[$i],
                        'date' => date('Y-m-d')
                    ];

                    ProductionDetails::create($data2);
                }
            }

            $notification = [
                'message'   =>  'Data successfully inserted',
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        } catch (Throwable $e) {
            $notification = [
                'message'   =>  $e->getMessage(),
                'alert-type'    =>  'danger'
            ];
            return redirect()->back()->with($notification);
        }
    }


    public function details(Request $request)
    {
        $id = $request->id;
        $order = DB::table('productions')
            ->join('orders', 'productions.order_id', '=', 'orders.id')
            ->join('buyers', 'orders.buyer_id', '=', 'buyers.id')
            ->select('buyers.buyer_name', 'orders.shipment_date', 'orders.id')
            ->where('productions.id', $id)
            ->get();

        $production = DB::select("SELECT a.order_id, a.po_date, b.*, c.sample_name FROM productions a INNER JOIN production_details b ON b.po_id = a.id INNER JOIN samples c ON c.id = b.sample_id WHERE a.id = '" . $id . "'");
        return response()->json(array('items' => $production, 'data' => $order));
    }
}
