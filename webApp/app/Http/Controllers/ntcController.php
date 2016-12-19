<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ntcController extends Controller
{


    public function addRoute(Request $request)
    {

        DB::insert('insert into route (route_id,route_no,first_station_id,second_station_id) values(?,?,?,?)',[
            $request['routeid'],
            $request['routeNo'],
            $request['first'],
            $request['second'],

            
        ]);

        
    }

    public function allRoutes(Request $request)
    {
        DB::statement(' drop view if exists ntcstation1;');
        DB::statement(' drop view if exists ntcstation2;');
        DB::statement(' drop view if exists ntcallroutes;');
        DB::statement(' create view  ntcstation1 as select main_stations.station as station1 ,route.route_id,route.route_no  from route join main_stations on route.first_station_id=main_stations.station_id');
        DB::statement(' create view  ntcstation2 as select main_stations.station as station2 ,route.route_id,route.route_no  from route join main_stations on route.second_station_id=main_stations.station_id');
        DB::statement('create view ntcallroutes as select ntcstation1.station1,ntcstation1.route_id,ntcstation1.route_no,ntcstation2.station2 from ntcstation1 join ntcstation2 on ntcstation1.route_id=ntcstation2.route_id');
        $results = DB::select('select ntcstation1.route_id,ntcstation1.route_no,station1,station2 from ntcstation1 join ntcstation2 on ntcstation1.route_id=ntcstation2.route_id ');

        return view('NTC.allRoutes', ['results' => $results ]);

    }


//    public function doAjax($x)
//    {
//          $y=$x*5;
//        return response()->json([
//            'y' => $y
//        ]);
//    }

    public function index(){
        return view('changeroute');

    }
    public function search($x){

            $output="";

            $routes=DB::table('ntcallroutes')->where('station1','LIKE','%'.$x.'%')
                                ->orWhere('station2','LIKE','%'.$x.'%')->get();
            if($routes){
                foreach($routes as $key =>$route) {
                    $output .= '<tr>' .
                        '<td>' .$route->route_no.'</td>'.
                        '<td>' .$route->station1.'</td>'.
                        '<td>' .$route->station2.'</td>'.
                        '</tr>';

                }
                return $output;
            }
    }

}
