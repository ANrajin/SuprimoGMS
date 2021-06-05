<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SampleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Model\Sample;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = DB::select("SELECT a.*, b.product_name FROM samples a INNER JOIN product_type b ON b.id = a.product_type_id");
        return view('pages.samples.index', compact('samples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyers = DB::table('buyers')->get();
        $products = DB::table('product_type')->get();
        return view('pages.samples.create', compact('buyers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if directory exist or not
        if (!Storage::exists("public/Sample")) {
            Storage::makeDirectory("public/Sample");
        }

        $image = null;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $image = rand(99, 1000) . '.' . $file->getClientOriginalExtension();
            } else {
                $notification = [
                    'message'   =>  'Supported file types are JPEG, JPG or PNG',
                    'alert-type'    =>  'warning'
                ];
                return redirect()->back()->with($notification);
            }
        }

        $data = [
            'merchandiser' => $request->merchandiser,
            'buyer_id' => $request->buyer_id,
            'season' => $request->season,
            'style_no' => $request->style_no,
            'sample_name' => $request->name,
            'sample_type' => $request->sample_type,
            'product_type_id' => $request->type_id,
            'image' => $image,
            'descriptions' => $request->desc,
            'specifications' => $request->spec,
        ];

        try {
            Sample::create($data);

            //store image into storage directory
            Storage::putFileAs('public/Sample', $file, $image);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
