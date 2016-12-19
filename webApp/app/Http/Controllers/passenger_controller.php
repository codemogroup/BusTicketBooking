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
        $nic=$request['your_nic'];
        $result=DB::select('select customer_id from customer where nic=?',[$nic]);
        if(empty($result)){
            return redirect('/passenger_signup');

        }else{

            $customer_id=$result[0]->customer_id;
            $journey_result=DB::select('select distinct(booking_id),date,seats,bus.type,bus_fee.price_normal,bus_fee.price_highway,journey.direction,station,temp.end_station from booking,bus,fare,bus_fee,intermediate,journey,(select distinct(booking_id) as id,station as end_station from booking,fare,intermediate where customer_id=? and  booking.fare_id=fare.fare_id and  fare.intermediate_id_2=intermediate.intermediate_id) as temp where customer_id=? and booking.bus_id=bus.bus_id and booking.fare_id=fare.fare_id and bus_fee.price_id=fare.price_id and fare.intermediate_id_1=intermediate.intermediate_id and booking.journey_id=journey.journey_id and booking_id=temp.id',[$customer_id,$customer_id]);
            /*foreach ($journey_result as $row){
                $seats=$row->seats;
                $type=$row->type;
                $normal=$row->price_normal;
                $highway=$row->price_highway;
                $direction=$row->direction;
                $station=$row->station;
                $end_station=$row->end_station;
                if ($direction=='1'){
                    $row['station']=$end_station;
                    $row['end_station']=$station;

                }
                if($type=='normal'){

                }elseif ($type=='semiluxury'){

                }elseif ($type=='luxury'){

                }else{

                }




            }*/
            return view('passenger.passenger_view_results',['journey_result'=>$journey_result]);

        }



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