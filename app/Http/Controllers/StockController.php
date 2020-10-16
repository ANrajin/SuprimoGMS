<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function index()
    {
        $stocks = DB::select("SELECT a.id, a.trims_name, a.type, a.qty, SUM(b.dispatch_qty) as stock FROM trims a INNER JOIN dispatch b ON b.trims_id = a.id GROUP BY a.id, a.trims_name, a.type, a.qty, b.trims_id");
        return view('pages.stocks.index', compact('stocks'));
    }


    public function listItems(Request $request)
    {
        $id = $request->id;
        $trims = DB::table('trims')
            ->join('suppliers', 'trims.supplier_id', '=', 'suppliers.id')
            ->select('trims.*', 'suppliers.supplier_name')
            ->where('trims.id', $id)
            ->get();

        $items = DB::table('dispatch')
            ->join('trims', 'dispatch.trims_id', '=', 'trims.id')
            ->select('dispatch.*', 'trims.trims_name')
            ->where('trims_id', $id)
            ->get();

        return response()->json(array('trims' => $trims, 'items' => $items));
    }
}
