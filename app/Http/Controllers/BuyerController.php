<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BuyerAddRequest;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = DB::select("SELECT * FROM countries");
        $buyers = DB::select("SELECT * FROM buyers");
        return view('pages.buyers.index', compact('countries', 'buyers'));
    }

    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuyerAddRequest $request)
    {
        $data = [
            'unique_id' => $request->unique_id,
            'buyer_name' => $request->buyer_name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'buyer_type' => $request->buyer_type,
            'created_at' => now()
        ];

        try {
            DB::table('buyers')->insert($data);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $buyers = DB::table('buyers')->where('id', $id)->get();
            return response()->json($buyers);
        } catch (\Throwable $e) {
            return response()->json(array("status" => "404", "msg" => $e->getMessage()));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $data = [
            'buyer_name' => $request->buyer_name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'buyer_type' => $request->buyer_type,
            'updated_at' => now()
        ];

        try {
            DB::table('buyers')->where('id', $id)->update($data);
            $notification = [
                'message'   =>  'Data successfully updated',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $arr = $request->id;
            $csv = implode(", ", $arr);

            $delete = DB::delete("DELETE FROM buyers WHERE id IN ($csv)");

            if ($delete) {
                return response()->json(array("status" => "200"));
            }
        } catch (\Throwable $e) {
            return response()->json(array("status" => "404", "msg" => $e->getMessage()));
        }
    }
}
