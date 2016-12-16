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


Route::get('operator', function () {
     return view('operator');

});

Route::get('/ownerhome',function (){
   return view('bus_owner.ownerhome'); 
})->name('ownerhome');



Route::group(['middleware' => ['web']], function () {
    Route::post('/submitsigninowner', 'busOwnerController@createOwner');
});
