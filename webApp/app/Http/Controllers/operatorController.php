<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class operatorController extends Controller
{
    public function getTicket(Request $request)
    {

        DB::statement(' CREATE VIEW jour AS SELECT column_name(s) FROM table_name WHERE condition');



        $results =DB::select('select booking.date,booking.seats ,customer.name ,bus.plateNo
                  from booking 
                  join customer on booking.customer_id=customer.customer_id 
                  join bus on booking.bus_id=bus.bus_id 
                  join journey on booking.journey_id=journey.journey_id
                  where customer.nic =:nic',['nic'=>$request['nic']]);
       // $results1 =DB::select('select name from customer where  customer_id=:nic',['nic'=>$request['nic']]);
       // return $results;
       // $id=$results[0]->booking_id;
       // $name=$results1[0]->name;
        //return redirect()->route('searchtickets');;
        //return view('operator_show_tickets')->with('id',$id);
       // return view('operator.operator_show_tickets', ['id' => $id,'name' => $name ]);
        return $results;
        }
  
}
//join journey on booking.journey_id=journey.journey_id
//join route on journey.journey_id= route.route_id