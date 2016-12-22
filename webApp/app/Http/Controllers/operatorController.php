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

        $results = DB::select('call get_operator_result(?)',[$request['nic']]);
        return view('operator.operator_show_tickets', ['results' => $results ]);

    }
    public function setIssue(Request $request)
    {
        DB::update('update booking set status = 1 where booking.booking_id =:booking_id', ['booking_id' => $request['booking_id']]);
        return $this->getTicket($request);

    }
    public function setReject(Request $request)
    {
        DB::update('update booking set status = 2 where booking.booking_id =:booking_id', ['booking_id' => $request['booking_id']]);
        return $this->getTicket($request);
    }
    public function getProfile()
    {
        $results = DB::select('select operator.operator_id,operator.name,operator.nic ,operator.telephone,operator.address,operator.email,operator.station_id,main_stations.station from operator join main_stations on operator.station_id=main_stations.station_id where operator_id =:id', ['id' => session()->get('id')]);
       // return $results;
        return view('operator.operator_show_profile', ['results' => $results[0] ]);
    }
    public function signIn(Request $request)
    {
        $id=$request['id'];
        $pw=$request['password'];
        $count =DB::select('select operator_get_customer_count(?,?) as x',[$id,$pw] );
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
        return view('welcome');

    }
    public function changePassword(Request $request)
    {
        $new=$request['password_new'];
        $old=$request['password_old'];
        $conf=$request['password_confirm'];

        $results = DB::select('select operator.password from operator where operator.operator_id =:id', ['id' => session()->get('id')]);
        $password=$results[0];
        $pswrd=$password->password;
        if ($pswrd==$old){
            if ($new==$conf){
                DB::update('update operator set operator.password =:password where operator.operator_id =:id', ['id' => session()->get('id'),'password' =>$new]);
                return view('operator.operator');
            }
        }
        return view('operator.operator_change_password');
    }
}
//join journey on booking.journey_id=journey.journey_id
//join route on journey.journey_id= route.route_id