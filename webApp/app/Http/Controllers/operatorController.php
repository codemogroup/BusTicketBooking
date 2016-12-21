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

        $results = DB::select('call get_operator_result(?)',[$request['nic']]);
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
    public function getProfile()
    {
        $results = DB::select('select operator.operator_id,operator.name,operator.nic ,operator.telephone,operator.address,operator.email,operator.station_id from operator where operator_id =:id', ['id' => session()->get('id')]);
        return view('operator.operator_profile', ['results' => $results ]);
    }
    public function signIn(Request $request)
    {
        $id=$request['id'];
        $count =DB::select('select operator_get_customer_count(?) as x',[$id] );
        $count1=$count[0]->x;
        /*return ($count1)+1*/;

       if ($count1==0){
            return view('operator.operator_signin');
        }else {
            session()->put(['id' => $id]);
            return view('operator.operator', ['results' => $id]);
        }

    }
    public function signOut()
    {
        session()->remove('id');
        return view('operator.operator_signin');

    }
}
//join journey on booking.journey_id=journey.journey_id
//join route on journey.journey_id= route.route_id