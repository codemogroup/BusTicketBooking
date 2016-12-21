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
                $temp = array();
                $temp['journey_id'] = $journy->journey_id;
                $temp['time'] = $journy->time;
                $temp['unavailable_days'] = $journy->unavailable_days;
                $temp['bus_id'] = $journy->bus_id;

                $temp['bus_no'] = $this->getBusNo($temp['bus_id']);
                $temp['bus_type'] = $this->getBusType($temp['bus_id']);
                $temp['seatsdetails'] = $this->getBusSeatsDetails($temp['bus_id'], $date, $temp['journey_id']);


//                $temp['available'] = $temp['seatsdetails']['forbook'] - count($temp['seatsdetails']['bookedSeatsArray']);
                $temp['available'] = $temp['seatsdetails']['forbook'] - $temp['seatsdetails']['NumberOfBookedSeats'];

                $temp['route_id'] = $journy->route_id;


                if (!empty($temp)) {

                    array_push($journies, $temp);

                }

            }

        }
//        $result=array_unique($journies,SORT_REGULAR);
//        return $idto;
        return view('passenger.passenger_search_results')->with('buses', $journies)->with('date', $date)->with('from', $from)->with('to', $to)->with('direction', $direction);
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

    public function getBusSeatsDetails($id, $date, $journeyId)
    {
        $availableForBooking = DB::select('select seats_for_booking from bus where bus_id=?', [$id])[0]->seats_for_booking;
        $selectedseatsArr = DB::select('select no_of_seats from booking where date=? and bus_id=? and journey_id=? and (status=0 or status=1)', [$date, $id, $journeyId]);
        $selectedseatsCount = DB::select('select seats from booking where date=? and bus_id=? and journey_id=? and (status=0 or status=1)', [$date, $id, $journeyId]);

        $seats = array();
        foreach ($selectedseatsArr as $seatsq) {
            $seatStr = $seatsq->no_of_seats;
            $pieces = explode(',', $seatStr);
            foreach ($pieces as $piece) {
                array_push($seats, $piece);
            }
        }

        $total = 0;
        foreach ($selectedseatsCount as $seatCount) {
            $seatnum = $seatCount->seats;
            $total += $seatnum;

        }
        $busDetails['forbook'] = $availableForBooking;
        $busDetails['bookedSeatsArray'] = $seats;
        $busDetails['NumberOfBookedSeats'] = $total;
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

        $result = array_unique($routes);
        return $result;

    }


    public function addBooking(Request $request)
    {

        $date = $request['date'];
        $journeyId = $request['journey_id'];
        $busId = $request['bus_id'];
        $from = $request['from'];
        $to = $request['to'];
        $direction = $request['direction'];
        $type = $request['type'];
        $busNo = $request['bus_no'];
        $time = $request['time'];
        $available = $request['available'];


        return view('passenger.passenger_new_booking')
            ->with('date', $date)->with('journey_id', $journeyId)->with('bus_id', $busId)->with('bus_no', $busNo)
            ->with('from', $from)->with('to', $to)->with('direction', $direction)->with('type', $type)->with('time', $time)
            ->with('available', $available);
    }

    public function submitBooking(Request $request)
    {

//        return $fare_id;
        $customer_id = $request['passenger_id'];
        $cusArray = $this->getCustomers();
        if (in_array($customer_id, $cusArray)) {
//
            $date = $request['date'];
            $seats = $request['numOfSeats'];
            $bus_id = $request['bus_id'];
            $journey_id = $request['journey_id'];

            $from = $request['from'];
            $to = $request['to'];
            $fare_id = $this->findFareId($from, $to);
            $type = $request['type'];

            $priceDetail = $this->getPrice($fare_id);
//            return $priceDetail;
            $unitprice = 0;

            switch ($type) {
                case 'normal':
                    $unitprice = $priceDetail['priceN'];
                    break;
                case 'semi luxery':
                    $unitprice = 1.5 * $priceDetail['priceN'];
                    break;
                case 'luxury':
                    $unitprice = 2 * $priceDetail['priceN'];
                    break;
                case 'highway':
                    $unitprice = 2 * $priceDetail['priceH'];
                    break;
            }
            $total = $unitprice * $seats;
            return view('passenger.confirmbooking')->with('date', $date)->with('seats', $seats)->with('bus_id', $bus_id)
                ->with('journey_id', $journey_id)->with('customer_id', $customer_id)->with('from', $from)->with('to', $to)
                ->with('fare_id', $fare_id)->with('unitPrice', $unitprice)->with('total', $total);
        }
        return redirect()->back();

    }


    public function confirmBooking(Request $request)
    {
        $date = $request['date'];
        $bus_id = $request['bus_id'];
        $journey_id = $request['journey_id'];

        $customer_id = $request['customer_id'];
        $fare_id = $request['fare_id'];
        $seats=$request['seats'];

        DB::insert('insert into booking (date,seats,bus_id,journey_id,customer_id,fare_id,status) values (?,?,?,?,?,?,0)', [
            $date, $seats, $bus_id, $journey_id, $customer_id, $fare_id
        ]);

        return view('passenger.passenger_search');
    }

    public function getPrice($fareid)
    {
        $priceId = DB::select('select price_id from fare where fare_id=?', [$fareid])[0]->price_id;
        $priceN = DB::select('select price_normal from bus_fee where price_id=?', [$priceId])[0]->price_normal;
        $priceH = DB::select('select price_highway from bus_fee where price_id=?', [$priceId])[0]->price_highway;

        return ['priceN' => $priceN, 'priceH' => $priceH];
    }

    public function findFareId($inter1, $inter2)
    {
        $resultArr = DB::select('select fare_id from fare,intermediate as f,intermediate as t where fare.intermediate_id_1=f.intermediate_id and f.station=? and fare.intermediate_id_2=t.intermediate_id and t.station=?', [$inter1, $inter2]);

        if (empty($resultArr)) {
            $resultArr = DB::select('select fare_id from fare,intermediate as f,intermediate as t where fare.intermediate_id_1=f.intermediate_id and f.station=? and fare.intermediate_id_2=t.intermediate_id and t.station=?', [$inter2, $inter1]);
        }
        if (empty($resultArr)) {
            return redirect()->back();
        }
        $fareId = $resultArr[0]->fare_id;
        return $fareId;
    }

    public function getCustomers()
    {
        $cusArray = DB::select('select customer_id from customer');

        $array = array();
        foreach ($cusArray as $cus) {
            array_push($array, $cus->customer_id);
        }

        return $array;
    }

}