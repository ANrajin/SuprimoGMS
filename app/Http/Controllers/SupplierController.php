<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = DB::select("SELECT * FROM countries");
        $suppliers = DB::select("SELECT * FROM suppliers");
        return view('pages.suppliers.index', compact('countries', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        $data = [
            'unique_id' => $request->unique_id,
            'supplier_name' => $request->supplier_name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'supplier_of' => $request->supplier_of,
            'supplier_type' => $request->supplier_type,
            'created_at' => now()
        ];

        try {
            if (Supplier::create($data)) {
                $notification = [
                    'message'   =>  'Data successfully inserted',
                    'alert-type'    =>  'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                $notification = [
                    'message'   =>  'Something Went Wrong',
                    'alert-type'    =>  'warning'
                ];
                return redirect()->back()->with($notification);
            }
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
            $supplier = DB::table('suppliers')->where('id', $id)->get();
            return response()->json($supplier);
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
            'supplier_name' => $request->supplier_name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'supplier_of' => $request->supplier_of,
            'supplier_type' => $request->supplier_type
        ];

        try {
            Supplier::where('id', $id)->update($data);
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

            $delete = DB::delete("DELETE FROM suppliers WHERE id IN ($csv)");

            if ($delete) {
                return response()->json(array("status" => "200"));
            }
        } catch (\Throwable $e) {
            return response()->json(array("status" => "404", "msg" => $e->getMessage()));
        }
    }
}
