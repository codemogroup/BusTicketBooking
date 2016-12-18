<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class operatorController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getTicket(Request $request)
    {
        // DB::statement(' drop VIEW station1');
        // DB::statement(' drop VIEW station2');
        // DB::statement(' drop VIEW busfare');
        //  DB::statement(' CREATE VIEW station1 AS SELECT station as station1, intermediate_id_1,fare_id FROM intermediate join fare on fare.intermediate_id_1=intermediate.intermediate_id');
        //  DB::statement(' CREATE VIEW station2 AS SELECT station as station2, intermediate_id_2,fare_id FROM intermediate join fare on fare.intermediate_id_2=intermediate.intermediate_id');
        //   DB::statement(' CREATE VIEW busfare AS SELECT fare_id, price_normal,price_highway FROM bus_fee join fare on fare.price_id=bus_fee.price_id');

        $results = DB::select('select booking.date,booking.seats ,customer.name,customer.nic ,bus.plateNo,bus.type,journey.time,station1.station1, station2.station2, busfare.price_normal,busfare.price_highway
                  from booking 
                  join customer on booking.customer_id=customer.customer_id 
                  join bus on booking.bus_id=bus.bus_id 
                  join journey on booking.journey_id=journey.journey_id
                  join station1 on booking.fare_id= station1.fare_id
                  join station2 on booking.fare_id= station2.fare_id
                  join busfare on booking.fare_id= busfare.fare_id
                  where customer.nic =:nic', ['nic' => $request['nic']]);
        return view('operator.operator_show_tickets', ['results' => $results ]);
       //  $results1 =DB::select('select name from customer where  customer_id=:nic',['nic'=>$request['nic']]);
        // return $results;

    /*    $bookings = sizeof($results);
        foreach ($results as $results) {
            $nic = $results->nic;
            $name = $results->name;
            $date = $results->date;
            $seats = $results->seats;

            $type = $results->type;
            $plateNo = $results->plateNo;
            $station1 = $results->station1;
            $station2 = $results->station2;

            if ($type == 'highway') {
                $fare = $results->price_highway;
            } else
                $fare = $results->price_normal;

            // $name=$results1[0]->name;
            //return redirect()->route('searchtickets');;
            //return view('operator_show_tickets')->with('id',$id);
            return view('operator.operator_show_tickets', [
                'nic' => $nic,
                'date' => $date,
                'name' => $name,
                'seats' => $seats,
                'plateNo' => $plateNo,
                'station1' => $station1,
                'station2' => $station2,
                'fare' => $fare,
                'bookings' => $bookings,
            ]);
            // return $results;
        }*/
    }
  
}
//join journey on booking.journey_id=journey.journey_id
//join route on journey.journey_id= route.route_id