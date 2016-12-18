<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class passenger_controller extends Controller{
    public function passenger_search(Request $request){
        $this->validate($request,[
                'base_station' =>'required',
                'destination' => 'required',
                'journey_date' => 'required',
                'bus_type' =>'required'
            ]
            );
        $base_station=strtolower($request['base_station']);
        $destination=strtolower($request['destination']);
        $date=strtotime($request['journey_date']);
        $bus_type=$request['bus_type'];
        $current_date = strtotime(date('d-m-Y '));

        if($date<$current_date){
            return redirect('/passenger_home');
        }


        




    }
    public function passenger_cancel(Request $request){
        $this->validate($request,[
                'your_nic'=>'required'
        ]);


    }
    public function passenger_view(Request $request){
        $this->validate($request,[
            'your_nic'=>'required'
        ]);


    }
    public function passenger_signup(Request $request){
        $this->validate($request,[

        ]);

    }

}