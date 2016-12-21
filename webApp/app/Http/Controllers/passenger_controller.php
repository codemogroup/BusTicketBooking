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

    public function passenger_cancel_final(Request $request){
        $booking_id=$request['booking_id'];
        DB::update('update booking set booking.status=2 where booking.booking_id=?',[$booking_id]);
        return redirect('/passenger_cancel_booking');
    }
    public function passenger_cancel(Request $request){
        $this->validate($request,[
                'your_nic'=>'required',
                'booking_id'=>'required'

        ]);
        $nic=$request['your_nic'];
        $booking_id=$request['booking_id'];
        $result=DB::select('CALL get_cus_id(?)',[$nic]);
        if (empty($result)){
            return redirect('/passenger_signup');
        }else{
            $result2=DB::select('CALL get_customer_id(?)',[$booking_id]);
            if ($result[0]->customer_id==$result2[0]->customer_id){
                $customer_id=$result[0]->customer_id;
                $journey_result=DB::select('CAll booking_result(?)',[$customer_id]);
                return view('passenger.passenger_cancel_results',['journey_result'=>$journey_result]);

            }else{
                return redirect('/passenger_cancel_booking');
            }

        }

    }
    public function passenger_view(Request $request){
        $this->validate($request,[
            'your_nic'=>'required'
        ]);
        $nic=$request['your_nic'];
        $result=DB::select('CALL get_cus_id(?)',[$nic]);
        if(empty($result)){
            return redirect('/passenger_signup');

        }else{

            $customer_id=$result[0]->customer_id;
            $journey_result=DB::select('CAll booking_result(?)',[$customer_id]);
            
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
        $result=DB::select('CALL get_cus_id(?)',[$nic]);


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

        $result=DB::select('CALL get_cus_id(?)',[$nic]);
        

        if(empty($result)){
            return redirect('/passenger_signin');
        }
        else{
            return redirect('/passenger_home');
        }

    }

}