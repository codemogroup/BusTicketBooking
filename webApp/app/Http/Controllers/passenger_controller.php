<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;


class passenger_controller extends Controller
{
    public function passenger_search(Request $request)
    {
        $this->validate($request, [
                'base_station' => 'required',
                'destination' => 'required',
                'journey_date' => 'required',
                'bus_type' => 'required'
            ]
        );
        $base_station = strtolower($request['base_station']);
        $destination = strtolower($request['destination']);
        $date = strtotime($request['journey_date']);
        $bus_type = $request['bus_type'];
        $current_date = strtotime(date('d-m-Y '));

        if ($date < $current_date) {
            return redirect('/passenger_home');
        }


    }

    public function passenger_cancel(Request $request)
    {
        $this->validate($request, [
            'your_nic' => 'required'
        ]);


    }

    public function passenger_view(Request $request)
    {
        $this->validate($request, [
            'your_nic' => 'required'
        ]);


    }

    public function passenger_signup(Request $request)
    {
        $this->validate($request, [
            'passenger_name' => 'required',
            'nic' => 'required',
            'address' => 'required',
            'telephone' => 'required'


        ]);
        $passenger_name = strtolower($request['passenger_name']);
        $nic = $request['nic'];
        $address = $request['address'];
        $telephone = $request['telephone'];
        $result = DB::select('select customer_id from customer where nic=?', [$nic]);


        if (empty($result)) {
            DB::insert('insert into customer(name,nic,telephone,address) values(?,?,?,?)', [
                $passenger_name,
                $nic,
                $telephone,
                $address
            ]);
            return redirect('/passenger_home')->with(['nic' => $nic]);

        } else {
            return redirect('/passenger_home')->with(['nic' => $nic]);
        }

    }

    public function passenger_signin(Request $request)
    {
        $this->validate($request, [
            'nic' => 'required'

        ]);
        $nic = $request['nic'];

        $result = DB::select('select customer_id from customer where nic=?', [$nic]);


        if (empty($result)) {
            return redirect('/passenger_signin');
        } else {
            return redirect('/passenger_home');
        }

    }


    public function searchBuses(Request $request)
    {

        $from = $request['from'];
        $to = $request['to'];
        $date = $request['date'];
//        $type = $request['type'];

        $idfrom = DB::select("select intermediate_id from intermediate where station=?", [$from])[0]->intermediate_id;
        $idto = DB::select("select intermediate_id from intermediate where station=?", [$to])[0]->intermediate_id;

        if ($idto - $idfrom > 0) {
            $direction = 1;
        } else $direction = 0;

        //if the direction is 1 it is forward direction(need to send buses from first station to second station)
        //if the direction is 0 it is backward direction(need to send buses from second station to first station)
        //just find the route and send according to direction in journey table

        //routes must be added according to the convention.
        //in route table first station to second station intermediate ids should be increased.
        //first to second is forward (1)
        $routeIDarray = $this->getRouteId($idfrom, $idto); // this gives the all route_id that this passenger can use to go his journey

        //getting all the journies for the data.
        $journies = array();
        foreach ($routeIDarray as $routeID) {
            $journeyArray = DB::select("select * from journey where route_id=? and direction=?", [$routeID, $direction]);
            foreach ($journeyArray as $journy) {
                $temp=array();
                $temp['journey_id'] = $journy->journey_id;
                $temp['time'] = $journy->time;
                $temp['unavailable_days'] = $journy->unavailable_days;
                $temp['bus_id'] = $journy->bus_id;

                $temp['bus_no'] = $this->getBusNo($temp['bus_id']);
                $temp['bus_type'] = $this->getBusType($temp['bus_id']);
                $temp['seatsdetails'] = $this->getBusSeatsDetails($temp['bus_id'], $date,$temp['journey_id']);


                $temp['available'] = $temp['seatsdetails']['forbook'] - count($temp['seatsdetails']['bookedSeatsArray']);

                $temp['route_id'] = $journy->route_id;
                

                if (!empty($temp)) {

                        array_push($journies, $temp);

                }

            }

        }
//        $result=array_unique($journies,SORT_REGULAR);
//        return $result;
        return view('passenger.passenger_search_results')->with('buses',$journies)->with('date',$date)->with('from',$from)->with('to',$to)->with('direction',$direction);
    }


    public function getBusNo($id)
    {
        $no = DB::select('select number_plate from bus where bus_id=?', [$id])[0]->number_plate;
        return $no;
    }

    public function getBusType($id)
    {
        $type = DB::select('select type from bus where bus_id=?', [$id])[0]->type;
        return $type;
    }

    public function getBusSeatsDetails($id, $date,$journeyId)
    {
        $availableForBooking = DB::select('select seats_for_booking from bus where bus_id=?', [$id])[0]->seats_for_booking;
        $selectedseatsArr = DB::select('select no_of_seats from booking where date=? and bus_id=? and journey_id=? and (status=0 or status=1)', [$date, $id,$journeyId]);

        $seats = array();
        foreach ($selectedseatsArr as $seatsq) {
            $seatStr = $seatsq->no_of_seats;
            $pieces = explode(',', $seatStr);
            foreach ($pieces as $piece) {
                array_push($seats, $piece);
            }
        }
        $busDetails['forbook'] = $availableForBooking;
        $busDetails['bookedSeatsArray'] = $seats;
        return $busDetails;
    }


    public function getRouteId($idfrom, $idto)
    {
        $routeIdf = DB::select("select route_id from intermediate where intermediate_id=?", [$idfrom]);
        $farray = array();
        foreach ($routeIdf as $rou) {
            array_push($farray, $rou->route_id);

        }
        $routeIdt = DB::select("select route_id from intermediate where intermediate_id=?", [$idto]);
        $tarray = array();
        foreach ($routeIdt as $rou) {
            array_push($tarray, $rou->route_id);

        }
        $routes = array_intersect($tarray, $farray);

        $result=array_unique($routes);
        return $result;

    }



    public function addBooking(Request $request){
        
        $date=$request['date'];
        $journeyId=$request['journey_id'];
        $busId=$request['bus_id'];
        $from=$request['from'];
        $to=$request['to'];
        $direction=$request['direction'];
        $type=$request['type'];
        $busNo=$request['bus_no'];
        $time=$request['time'];
        
        
        return view('passenger.passenger_new_booking')
            ->with('date',$date)->with('journey_id',$journeyId)->with('bus_id',$busId)->with('bus_no',$busNo)
            ->with('from',$from)->with('to',$to)->with('direction',$direction)->with('type',$type)->with('time',$time);
    }
}