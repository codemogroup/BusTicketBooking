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


    public function signIn(Request $request)
    {
        $this->busRequests();
        $id=$request['id'];
        $pw=$request['password'];
        $count =DB::select('select ntc_get_user_count(?,?) as x',[$id,$pw] );
        $count1=$count[0]->x;
        /*return ($count1)+1*/;

        if ($count1==0){
            return view('NTC.signIn');
        }else {
            
            return view('NTC.ntc');
        }

    }


    public function addRoute(Request $request)
    {
        $this->busRequests();
        $base_id=0;
        $baseIDs = DB::select("select station_id from main_stations where station='".$request['base']."'");
        foreach ($baseIDs as $baseID){
            $base_id=$baseID->station_id;
        }
        $end_id=0;
        $endIDs = DB::select("select station_id from main_stations where station='".$request['end']."'");
        foreach ($endIDs as $endID){
            $end_id=$endID->station_id;
        }


        DB::insert('insert into route (route_id,route_no,first_station_id,second_station_id) values(?,?,?,?)',[
            $request['rid'],
            $request['routeNo'],
            $base_id,
            $end_id
        ]);
        $mainStations=$request['mymainInputs'];
        $count=0;
        $baseid=$request['rid']+0.001;
        DB::insert('insert into intermediate (route_id,station,intermediate_id) values(?,?,?)',[
            $request['rid'],
            $request['base'],
            $baseid
        ]);
        foreach ($mainStations as $interStaion) {

            DB::insert('insert into intermediate (route_id,station,intermediate_id) values(?,?,?)',[
                $request['rid'],
                $interStaion,
                $baseid+($count+1)*0.010
            ]);
            $count++;
        }
        $endid=$request['rid']+0.999;
        DB::insert('insert into intermediate (route_id,station,intermediate_id) values(?,?,?)',[
            $request['rid'],
            $request['end'],
            $endid

        ]);



    }

    public function addIntermediate(Request $request)
    {
        $this->busRequests();
        $route_id=$request['routeid'];
        $prior=$request['priors'];
        $main=$request['mains'];



        $results = DB::select("select intermediate_id from intermediate where station='".$prior."' and route_id='".$route_id."'");
        $priorInter=$results[0]->intermediate_id;

        DB::insert('insert into intermediate (route_id,station,intermediate_id) values(?,?,?)',[
            $route_id,
            $main,
            $priorInter+0.001

        ]);

        return view('NTC.routeChange');



    }


    public function saveNewOperatorStation(Request $request)
    {
        $this->busRequests();
        $station=$request['new'];
        $results = DB::select("select station_id from main_stations where station='".$station."'");


        DB::table('operator')
            ->where('operator_id', $request['opeid'])
            ->update(['station_id' => $results[0]->station_id]);

        return  view('NTC.operatorChange');

    }




    public function addOperator(Request $request)
    {
        $this->busRequests();
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

    public function addStation(Request $request)
    {
        $this->busRequests();
        $count = DB::select('SELECT COUNT(*) as count1 FROM main_stations ');
        foreach($count as $count2){
            $var1= $count2;
        }

        DB::insert('insert into main_stations (station_id,station) values(?,?)',[
            $var1->count1+1,
            $request['name']

        ]);

        $count = DB::select('SELECT COUNT(*) as count1 FROM main_stations ');
        return view('NTC.addNewStation', ['count' => $count ]);
    }

    public function allRoutes(Request $request)
    {
        $this->busRequests();
        DB::statement(' drop view if exists ntcstation1;');
        DB::statement(' drop view if exists ntcstation2;');
        DB::statement(' drop view if exists ntcallroutes;');
        DB::statement(' create view  ntcstation1 as select main_stations.station as station1 ,route.route_id,route.route_no  from route join main_stations on route.first_station_id=main_stations.station_id');
        DB::statement(' create view  ntcstation2 as select main_stations.station as station2 ,route.route_id,route.route_no  from route join main_stations on route.second_station_id=main_stations.station_id');
        DB::statement('create view ntcallroutes as select ntcstation1.station1,ntcstation1.route_id,ntcstation1.route_no,ntcstation2.station2 from ntcstation1 join ntcstation2 on ntcstation1.route_id=ntcstation2.route_id');
        $results = DB::select('select ntcstation1.route_id,ntcstation1.route_no,station1,station2 from ntcstation1 join ntcstation2 on ntcstation1.route_id=ntcstation2.route_id ');
        return view('NTC.allRoutes', ['results' => $results ]);

    }

    public function allStations(Request $request)
        
    {
        $this->busRequests();
        $results = DB::select('select * from main_stations');
        return view('NTC.allStations', ['results' => $results ]);

    }

    

    public function allOperators(Request $request)
    {
        $this->busRequests();

        $results = DB::select('select * from operator join main_stations on operator.station_id=main_stations.station_id ');
        return view('NTC.allOperators', ['results' => $results ]);
    }

    public function addNewOperator(Request $request)
    {
        $this->busRequests();
        $count = DB::select('SELECT COUNT(*) as count1 FROM operator ');
        return view('NTC.addNewOperator', ['count' => $count ]);

    }


    public function busRequests()
    {
        



    }

    public function addNewRoute(Request $request)
    {
        $this->busRequests();
        $count = DB::select('SELECT COUNT(*) as count1 FROM route ');

        return view('NTC.addNewRoute', ['count' => $count ]);

    }

    public function addNewStation(Request $request)
    {
        $this->busRequests();
        $count = DB::select('SELECT COUNT(*) as count1 FROM main_stations ');

        return view('NTC.addNewStation', ['count' => $count ]);

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
                        '<td><a type="button" ' . $route->route_id . 'Btn" class="waves-effect waves-light btn" href="/editroute/'.$route->route_id.'" >Edit</a></td>' .
                        '</tr>';

                }
                return $output;

            }
    }

    public function busSearch($x){


        $output = "";

        $buses = DB::table('bus')->where('number_plate', 'LIKE', '%' . $x . '%')
            ->get();
        if ($buses) {
            foreach ($buses as $key => $bus) {
                $output .= '<tr>' .
                    '<td>' . $bus->number_plate . '</td>' .
                    '<td>' . $bus->type . '</td>' .
                    '<td>' . $bus->no_of_seats . '</td>' .
                    '<td>' . $bus->seats_for_booking . '</td>' .
                    '</tr>';

            }
            return $output;

        }
    }


    public function searchOperator($x){


        $output = "";

        $operators = DB::table('operator')->where('name', 'LIKE', '%' . $x . '%')->get();

       if ($operators) {
            foreach ($operators as $key => $operator) {
               $results = DB::select("select station from main_stations where station_id='".$operator->station_id."'");
                $output .= '<tr>' .
                    '<td>' . $operator->name . '</td>' .
                    '<td>' . $operator->nic . '</td>' .
                    '<td>' . $operator->telephone . '</td>' .
                    '<td>' . $operator->address . '</td>' .
                    '<td>' . $operator->email . '</td>' .
                    '<td>' . $results[0]->station . '</td>' .
                    '<td><a type="button" id="' . $operator->operator_id . 'Btn" class="waves-effect waves-light btn" href="/editoperator/'.$operator->operator_id.'" >Edit</a></td>' .
                    '</tr>';

        }
            return $output;

       }
    }


    public function editOperator($operator_id)
    {
        $this->busRequests();
        $results = DB::select("select * from operator where operator_id='".$operator_id."'");
        $station = DB::select("select station from main_stations where station_id='".$results[0]->station_id."'");


        return view('NTC.operatorEdit', ['result' => $results ,'station' => $station]);

    }

    public function editRoute($route_id){
        $this->busRequests();
        $base=null;
        $end=null;
        $routeno=0;
        $inter = DB::select("select station,intermediate_id from intermediate where route_id='".$route_id."'");

        $results = DB::select("select * from ntcallroutes where route_id='".$route_id."'");

        foreach ($results as $result){
            $base=$result->station1;
            $end=$result->station2;
            $routeno=$result->route_no;

        }
        return view('NTC.routeEdit', ['inter' => $inter ,'route_id' => $route_id ,'route_no' => $routeno,'base' => $base ,'end' => $end]);

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
