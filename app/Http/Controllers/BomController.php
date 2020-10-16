<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class BomController extends Controller
{
    public function index()
    {
        echo "heelo";
    }


    public function create()
    {
        $sample = DB::table('samples')->select('id', 'sample_name')->get();
        $trims = DB::table('trims')->get();
        return view('pages.samples.bom', compact('sample', 'trims'));
    }


    public function store(Request $request)
    {
        $data = [
            'sample_id' => $request->sample_id,
            'user_id' => Auth::user()->id,
            'desc' => $request->desc
        ];

        $insert_id = DB::table('bom')->insertGetId($data);

        if ($insert_id) {
            foreach (session('bom') as $key => $details) {
                $data = [
                    'bom_id' => $insert_id,
                    'trim_id' => $key,
                    'qty' => $details['qty'],
                    'price' => $details['price'],
                ];

                DB::table('bom_details')->insert($data);
            }
        }

        $notification = [
            'message'   =>  'Data successfully inserted',
            'alert-type'    =>  'success'
        ];
        session()->forget('bom');
        return redirect()->back()->with($notification);
    }


    public function view($id)
    {
        $data1 = DB::table('bom')
            ->join('samples', 'bom.sample_id', '=', 'samples.id')
            ->join('users', 'bom.user_id', '=', 'users.id')
            ->select('bom.*', 'samples.sample_name', 'samples.image', 'users.name')
            ->where('bom.sample_id', $id)
            ->first();

        $data2 = DB::table('bom')
            ->join('bom_details', 'bom.id', '=', 'bom_details.bom_id')
            ->join('trims', 'bom_details.trim_id', '=', 'trims.id')
            ->select('bom.id', 'bom_details.*', 'trims.trims_name')
            ->where('sample_id', $id)
            ->get();

        if ($data1 && $data2) {
            return view('pages.samples.bom_details', compact('data1', 'data2'));
        } else {
            $notification = [
                'message'   =>  'No Bill of Materials Found',
                'alert-type'    =>  'warning'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
