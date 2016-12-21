<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;

class busOwnerController extends Controller
{
    public function createOwner(Request $request)
    {

        DB::insert('insert into owner (owner_id,name,nic,address,email,telephone,password) values(?,?,?,?,?,?,?)', [
            $request['token'],
            $request['name'],
            $request['nic'],
            $request['address'],
            $request['email'],
            $request['telephone'],
//            $request['account_num'],
            $request['password'],
        ]);

        $email = $request['email'];
        session()->put(['user' => $email]);
//        return  $this->getHome($request['email']);
        return redirect('ownerhome')->with(['email' => $email]);
    }


    public function signIn(Request $request)
    {
        $email = $request['email'];
        $passwordarray = DB::select("select password from owner where email=:e", ['e' => $email]);
        $password = $passwordarray[0]->password;

        if ($password == $request['password']) {

            session()->put(['user' => $email]);

            return redirect('ownerhome');
        } else {
            return redirect()->back();
        }

    }

    public function signOut()
    {
        session()->remove('user');
        return redirect('/');
    }

    public function getBankDetails()
    {
        $arr=$this->getBasicDetails();
        $email = $arr['email'];
        $bankdetails = $this->getAccountDetails($email);

        if ($bankdetails == null) {
            $message = 'You have not entered a bank account please enter your account here';
            $message2 = '';
            $true = FALSE;

            $name = $arr['name'];
        } else {
            $message = 'Your account number is: ' . $bankdetails[0]->account_num;
            $message2 = 'Your current balance is ' . $bankdetails[0]->total;
            $true = TRUE;
            $name = $bankdetails[0]->name;
        }

        return view('bus_owner.bankAccount')->with('email', $email)->with('name', $name)->with('message', $message)->with('message2', $message2)->with('true', $true);
    }

    public function getBasicDetails(){
        $email = session()->get('user');

        $namearray = DB::select('select name from owner where email=?', [$email]);
        $name = $namearray[0]->name;
        return ['email'=>$email,'name'=>$name];
    }


    public function getAddbus(){
        $arr=$this->getBasicDetails();
        return view('bus_owner.addbus')->with('email',$arr['email'])->with('name',$arr['name']);
    }

    public function addAccount(Request $request)
    {
        $email = $request['email'];

        $account = $request['accountnum'];

        DB::insert('insert into bank_account (account_num,total) values (?,?)', [
            $account,
            0
        ]);

        DB::update('update owner set account_num=? where email=?', [$account, $email]);

        return $this->getBankDetails();
    }

    public function getAccountDetails($email)
    {

        $accontdetails = DB::select('select owner.name,owner.account_num,total from bank_account,owner where owner.account_num=bank_account.account_num and email=?', [$email]);
        return $accontdetails;
    }


    public function addBusRequest(Request $request)
    {

        $from = $request['from'];
        $to = $request['to'];
        $routeID = $this->findRouteIdByMainStations($from, $to);
        if(!$routeID){
            return $this->getHome();
        }
        $id = $this->getUserId();

        DB::insert('insert into bus_requests (number_plate,type,no_of_seats,seats_for_booking,owner_id,route_id) values (?,?,?,?,?,?)', [
            $request['number_plate'],
            $request['type'],
            $request['seats'],
            $request['seats_for_booking'],
            $id,
            $routeID

        ]);
        return $this->getAddbus();
    }

    public function findRouteIdByMainStations($from, $to)
    {
        $firstIdA = DB::select('select station_id from main_stations where station=?', [$from]);
        $firstId = $firstIdA[0]->station_id;
        $secondIdA = DB::select('select station_id from main_stations where station=?', [$to]);
        $secondId = $secondIdA[0]->station_id;
        $result = DB::select('select route_id from route where first_station_id=? and second_station_id=?', [$firstId, $secondId]);

        if (Empty($result)) {
            $result = DB::select('select route_id from route where first_station_id=? and second_station_id=?', [$secondId, $firstId]);
        }if (Empty($result)) {
        return false;

    }
        return $result[0]->route_id;
    }

    public function getUserId()
    {
        $email = session()->get('user');

        $id = DB::select('select owner_id from owner where email=?', [$email]);

        return $id[0]->owner_id;
    }

    public function testmeth()
    {
        return $this->findRouteIdByMainStations();
    }



}