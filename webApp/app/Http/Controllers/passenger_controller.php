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
            'passenger_name'=>'required',
            'nic'=>'required',
            'address'=>'required',
            'telephone'=>'required'


        ]);
        $passenger_name=strtolower($request['passenger_name']);
        $nic=$request['nic'];
        $address=$request['address'];
        $telephone=$request['telephone'];
        $result=DB::select('select customer_id from customer where nic=?',[$nic]);


        if(empty($result)){
            DB::insert('insert into customer(name,nic,telephone,address) values(?,?,?,?)',[
                $passenger_name,
                $nic,
                $telephone,
                $address
            ] );
            return redirect('/passenger_home')->with(['nic'=>$nic]);

        }
        else{
            return redirect('/passenger_home')->with(['nic'=>$nic]);
        }

    }
    public function passenger_signin(Request $request){
        $this->validate($request,[
            'nic'=>'required'

        ]);
        $nic=$request['nic'];

        $result=DB::select('select customer_id from customer where nic=?',[$nic]);
        

        if(empty($result)){
            return redirect('/passenger_signin');
        }
        else{
            return redirect('/passenger_home');
        }

    }

}