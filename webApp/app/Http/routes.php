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



Route::get('operator_new_booking', function () {
    return view('operator_new_booking');
});
Route::get('operator_cancel_booking', function () {
    return view('operator_cancel_booking');
});
Route::get('operator_issue_tickets', function () {
    return view('operator_issue_tickets');
});
Route::get('operator_verify_journey', function () {
    return view('operator_verify_journey');
});



//

Route::get('/signin', function () {
    return view('authentication.signin');
});
//returnRoute::get('operator', function () {
//     return view('operator');
//});
Route::get('/signup', function () {
    return view('authentication.signup');
});

Route::get('operator', function () {
    return view('operator.operator');
});


//operator routing ends



Route::get('/forgotpassword', function () {
    return view('authentication.forgotpassword');
});
//


Route::get('/ownerreg', function () {
    return view('bus_owner.signup');
});



//Route::get('operator', function () {
//     return view('operator');
//
//});

Route::get('/ownerhome',function (){
    return view('bus_owner.ownerhome');
})->name('ownerhome');


Route::get('/passenger_home',function (){
    return view('passenger.passenger_search');
});
Route::get('/passenger_search',function (){
    return view('passenger.passenger_search');

//Route::get('ownerhome',function($email) {
//    return view('bus_owner.ownerhome')->with('email',$email);
});


Route::get('ownersignup', function () {
    return view('bus_owner.signup');

});

Route::get('/passenger_new_booking',function (){
    return view('passenger.passenger_new_booking');
});

Route::get('/passenger_cancel_booking',function (){
    return view('passenger.passenger_cancel_booking');
});
Route::get('/passenger_view_booking',function (){
    return view('passenger.passenger_view_booking');
});
Route::get('/passenger_view_results',function (){
    return view('passenger.passenger_view_results');
});
Route::get('/passenger_cancel_results',function (){
    return view('passenger.passenger_cancel_results');
});
Route::get('/passenger_search_results',function (){
    return view('passenger.passenger_search_results');
});
Route::get('/passenger_seat_book',function (){
    return view('passenger.passenger_seat_book');
});
Route::get('/passenger_pay',function (){
    return view('passenger.passenger_pay');
});
Route::get('/passenger_signin', function () {
    return view('authentication.passenger_signin');
});
Route::get('/passenger_signup', function () {
    return view('authentication.passenger_signup');
});

Route::get('signout','busOwnerController@signout');


Route::group(['middleware' => ['web']], function () {
    Route::post('/submitownersignup', 'busOwnerController@createOwner');
    Route::post('/submitownersignin','busOwnerController@signIn');
    Route::post('submit_nic', 'operatorController@getTicket');


    Route::post('addbankaccount', 'busOwnerController@addAccount');


    Route::post('addbankaccount','busOwnerController@addAccount');


    Route::post('/submitsigninowner', 'busOwnerController@createOwner');
    Route::post('/passenger_search', 'passenger_controller@passenger_search');
    Route::post('/passenger_cancel', 'passenger_controller@passenger_cancel');
    Route::post('/passenger_view', 'passenger_controller@passenger_view');
    Route::post('/passenger_signup', 'passenger_controller@passenger_signup');
    Route::post('/passenger_signin', 'passenger_controller@passenger_signin');

    Route::get('/passenger_search',function (){
        return view('passenger.passenger_search');
    });
    Route::get('/passenger_new_booking',function (){
        return view('passenger.passenger_new_booking');
    });
    Route::get('/passenger_cancel_booking',function (){
        return view('passenger.passenger_cancel_booking');
    });
    Route::get('/passenger_view_booking',function (){
        return view('passenger.passenger_view_booking');
    });
    Route::get('/passenger_signin', function () {
        return view('authentication.passenger_signin');
    });
    Route::get('/passenger_signup', function () {
        return view('authentication.passenger_signup');
    });


});

Route::get('ownerhome', 'busOwnerController@getHome')->middleware('authentication');






////////////////////////NTC routing starts


Route::get('ntc', function () {
    return view('NTC.ntc');
});

Route::get('ntctime', function () {
    return view('NTC.ntcTimeTable');
});

Route::get('addnewbus', function () {
    return view('NTC.addNewBus');
});

Route::get('addnewroute', function () {
    return view('NTC.addNewRoute');
});

Route::get('changeroute', function () {
    return view('NTC.routeChange');
});

Route::post('/search', 'ntcController@executeSearch');

//Route::post("doAjax/{x}","ntcController@doAjax");

Route::get('allroutes', 'ntcController@allRoutes');
Route::get('changeindex', 'ntcController@index');
Route::post('/ntcsearch/{x}', ['uses'=>'ntcController@search','as'=>'search']);


Route::group(['middleware' => ['web']], function () {
    Route::post('/submitaddroute', 'ntcController@addRoute');
    Route::post('/executesearch', array('uses'=>'ntcController@executeSearch'));

});
////////////////////////NTC routing ends

