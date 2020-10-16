<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class DefaultController extends Controller
{
    public function city($id)
    {
        $cities = DB::select("SELECT id, city_name FROM cities WHERE country_id = '" . $id . "'");

        return response()->json($cities);
    }

    public function getSamples()
    {
        $samples = DB::table('samples')->select('id', 'sample_name')->get();
        return response()->json($samples);
    }
}
