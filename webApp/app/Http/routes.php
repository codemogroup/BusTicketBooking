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

    return view('operator');
});


     return view('operator.operator');
});

//////////////////////// operator routing ends




Route::get('/forgotpassword', function () {
    return view('authentication.forgotpassword');
});




Route::get('operator', function () {
    return view('operator');

});


Route::get('/ownerhome', [
    'uses' => 'busOwnerController@home',
    'as'=>'ownerhome',
//    'middleware'=>'auth'
]);


Route::get('ownersignup', function () {
    return view('bus_owner.signup');
});

Route::get('ownersignin', function () {
    return view('bus_owner.signin');
});


Route::group(['middleware' => ['web']], function () {
    Route::post('/submitownersignup', 'busOwnerController@createOwner');
    Route::post('/submitownersignin', 'busOwnerController@signIn');
//    Route::post('/submitownersignin', function (){
//        return 'hi';
//    });
});


Route::get('testing2', function () {
    return view('testing2');
});