<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class commonController extends Controller
{
    //

    public function autoCompleteMainStation(Request $request)
    {
        $term = $request->term;

        $data = DB::table('main_stations')->where('station', 'LIKE', '%' . $term . '%')->get();

        $result = array();
        foreach ($data as $key => $v) {
            $result[] = ['value' => $v->station];
        }
        return response()->json($result);
    }


    
    public function autoCompleteIntermediateStation(Request $request)
    {
        $term = $request->term;

        $data = DB::table('intermediate')->where('station', 'LIKE', '%' . $term . '%')->get();
        $result = array();
        foreach ($data as $key => $v) {
            $result[] = ['value' => $v->station];
        }
        return response()->json($result);
    }
}
