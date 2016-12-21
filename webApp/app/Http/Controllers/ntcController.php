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
            $request['second']
        ]);
    }

    public function addOperator(Request $request)
    {
        $sname=$request['autocomplete-input'];
        $results = DB::select("select station_id from main_stations where station='".$sname."'");
        $station_id=0;
        foreach ($results as $result){
            $station_id=$result->station_id;
        }
        $count = DB::select('SELECT COUNT(*) as count1 FROM operator ');
        foreach($count as $count2){
            $var1= $count2;
        }

        DB::insert('insert into operator (operator_id,name,nic,telephone,address,email,password,station_id) values(?,?,?,?,?,?,?,?)',[
            $var1->count1+1,
            $request['name'],
            $request['nic'],
            $request['tel'],
            $request['address'],
            $request['email'],
            $request['nic']."pw",
            $station_id,

        ]);

        $count = DB::select('SELECT COUNT(*) as count1 FROM operator ');
        return view('NTC.addNewOperator', ['count' => $count ]);
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

    public function allOperators(Request $request)
    {
        $results = DB::select('select * from operator join main_stations on operator.station_id=main_stations.station_id ');
        return view('NTC.allOperators', ['results' => $results ]);
    }

    public function addNewOperator(Request $request)
    {
        $count = DB::select('SELECT COUNT(*) as count1 FROM operator ');
        return view('NTC.addNewOperator', ['count' => $count ]);

    }

    public function addNewRoute(Request $request)
    {
        $count = DB::select('SELECT COUNT(*) as count1 FROM route ');
        return view('NTC.addNewRoute', ['count' => $count ]);

    }




    public function index(){
        return view('changeroute');

    }
    public function search($x){


            $output = "";

            $routes = DB::table('ntcallroutes')->where('station1', 'LIKE', '%' . $x . '%')
                ->orWhere('station2', 'LIKE', '%' . $x . '%')
                ->orWhere('route_no', 'LIKE', '%' . $x . '%')->get();
            if ($routes) {
                foreach ($routes as $key => $route) {
                    $output .= '<tr>' .
                        '<td>' . $route->route_no . '</td>' .
                        '<td>' . $route->station1 . '</td>' .
                        '<td>' . $route->station2 . '</td>' .
                        '<td><a type="button" id="'.$route->route_id.'Btn"'.'class="waves-effect waves-light btn" href="ntctime">Edit</a></td>'.
                        '</tr>';

                }
                return $output;
            }

        
    }

    public function editRoute($route_id){



    }

    public function stationSearch($x){

        $stations = DB::table('main_stations')->where('station', 'LIKE', '%' . $x . '%')->get();
        if ($stations) {

            return $stations;
        }


    }

    public function autocomplete()
    {
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('main_stations')
            ->where('station', 'LIKE', '%' . $term . '%')
            ->get();

        foreach ($queries as $query) {
            $results[] = $query->station;
        }

        $res = json_encode($results);

        return response()->json(compact("res"), 200);
    }

}
