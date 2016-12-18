<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//////////////////////// operator routing starts

Route::get('operator_new_booking', function () {
    return view('operator.operator_new_booking');
});
Route::get('operator_cancel_booking', function () {
    return view('operator.operator_cancel_booking');
});
Route::get('operator_search_tickets', function () {
    return view('operator.operator_search_tickets');
});
Route::get('operator_show_tickets', function () {
    return view('operator.operator_show_tickets');
});
Route::get('operator_verify_journey', function () {
    return view('operator.operator_verify_journey');
});
Route::get('operator', function () {
    return view('operator.operator');
});


//////////////////////// operator routing ends


Route::get('/forgotpassword', function () {
    return view('authentication.forgotpassword');
});


Route::get('operator', function () {
    return view('operator.operator');

});


//Route::get('ownerhome',function($email) {
//    return view('bus_owner.ownerhome')->with('email',$email);
//});


Route::get('ownersignup', function () {
    return view('bus_owner.signup');
});

Route::get('ownersignin', function () {
    return view('bus_owner.signin');
});

Route::get('signout','busOwnerController@signout');


Route::group(['middleware' => ['web']], function () {
    Route::post('/submitownersignup', 'busOwnerController@createOwner');
    Route::post('/submitownersignin','busOwnerController@signIn');
    Route::post('submit_nic', 'operatorController@getTicket');


    Route::post('addbankaccount', 'busOwnerController@addAccount');
//    Route::post('/submitownersignin', function (){
//        return 'hi';
//    });

    Route::post('addbankaccount','busOwnerController@addAccount');


});

Route::get('ownerhome', 'busOwnerController@getHome'

)->middleware('authentication');

Route::get('testing2', function () {
    return view('testing2');
});

//Route::get('/ownerhome', function () {
//    return view('bus_owner.ownerhome');
//});


//Route::post('addbankaccount','busOwnerController@addAccount');

