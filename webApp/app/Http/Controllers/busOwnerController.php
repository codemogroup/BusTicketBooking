<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class busOwnerController extends Controller
{
    public function createOwner(Request $request)
    {

        DB::insert('insert into owner (owner_id,name,nic,address,email,telephone,password) values(?,?,?,?,?,?,?)',[
            $request['token'],
            $request['name'],
            $request['nic'],
            $request['address'],
            $request['email'],
            $request['telephone'],
//            $request['account_num'],
            $request['password'],
        ]);

        return redirect()->back();
        }
  
}
