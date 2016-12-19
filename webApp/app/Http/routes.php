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
Route::get('operator_issue_tickets', function () {
    return view('operator.operator_issue_tickets');
});
Route::get('operator_verify_journey', function () {
    return view('operator.operator_verify_journey');
});


Route::get('operator', function () {
     return view('operator.operator');
});

//////////////////////// operator routing ends

Route::get('/signin', function () {
    return view('authentication.signin');
});

Route::get('/signup', function () {
    return view('authentication.signup');
});
Route::get('/forgotpassword', function () {
    return view('authentication.forgotpassword');
});


Route::get('/ownerreg', function () {
    return view('bus_owner.signup');
});



Route::get('/ownerhome',function (){
   return view('bus_owner.ownerhome'); 
})->name('ownerhome');



Route::group(['middleware' => ['web']], function () {
    Route::post('/submitsigninowner', 'busOwnerController@createOwner');
});

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