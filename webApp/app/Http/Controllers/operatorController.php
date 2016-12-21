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
         DB::statement(' drop VIEW if exists station1');
         DB::statement(' drop VIEW if exists station2');
        DB::statement(' drop VIEW if exists busfare');
         DB::statement(' CREATE VIEW station1 AS SELECT station as station1, intermediate_id_1,fare_id FROM intermediate join fare on fare.intermediate_id_1=intermediate.intermediate_id');
         DB::statement(' CREATE VIEW station2 AS SELECT station as station2, intermediate_id_2,fare_id FROM intermediate join fare on fare.intermediate_id_2=intermediate.intermediate_id');
           DB::statement(' CREATE VIEW busfare AS SELECT fare_id, price_normal,price_highway FROM bus_fee join fare on fare.price_id=bus_fee.price_id');

        $results = DB::select('select booking.booking_id,booking.date,booking.seats ,booking.ticket_issued,customer.name,customer.nic ,bus.number_plate,bus.type,journey.direction, journey.time,station1.station1, station2.station2, busfare.price_normal,busfare.price_highway
                  from booking 
                  join customer on booking.customer_id=customer.customer_id 
                  join bus on booking.bus_id=bus.bus_id 
                  join journey on booking.journey_id=journey.journey_id
                  join station1 on booking.fare_id= station1.fare_id
                  join station2 on booking.fare_id= station2.fare_id
                  join busfare on booking.fare_id= busfare.fare_id
                  where customer.nic =:nic', ['nic' => $request['nic']]);
        return view('operator.operator_show_tickets', ['results' => $results ]);

    }
    public function setIssue(Request $request)
    {
        DB::update('update booking set ticket_issued = 1 where booking.booking_id =:booking_id', ['booking_id' => $request['booking_id']]);
        return $this->getTicket($request);

    }
    public function setReject(Request $request)
    {
        DB::update('update booking set ticket_issued = 2 where booking.booking_id =:booking_id', ['booking_id' => $request['booking_id']]);
        return $this->getTicket($request);
    }
  
}
//join journey on booking.journey_id=journey.journey_id
//join route on journey.journey_id= route.route_id