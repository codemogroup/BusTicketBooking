<?php
Route::get('/passenger_home',function (){
    return view('passenger.passenger_search');
});
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




























































Route::get('ntc', function () {
    return view('NTC.ntc');
});
Route::get('ntctime', function () {
    return view('NTC.ntcTimeTable');
});

Route::get('addnewbus', function () {
    return view('NTC.addNewBus');
});

Route::get('addnewoperator', function () {
    return view('NTC.addNewOperator');
});

Route::get('changeroute', function () {
    return view('NTC.routeChange');
});

Route::get('/changeoperator', function () {
    return view('NTC.operatorChange');
});

Route::get('allroutes', 'ntcController@allRoutes');
Route::get('allstations', 'ntcController@allStations');
Route::get('changeindex', 'ntcController@index');
Route::post('/ntcsearch/{x}', ['uses'=>'ntcController@search','as'=>'search']);
Route::post('/ntcsearchoperator/{x}', ['uses'=>'ntcController@searchOperator','as'=>'search2']);
Route::post('/ntcstationsearch/{x}', ['uses'=>'ntcController@autocomplete','as'=>'searchstation']);
Route::get('alloperators', 'ntcController@allOperators');
Route::get('addnewoperator', 'ntcController@addNewOperator');
Route::get('addnewroute1', 'ntcController@addNewRoute');
Route::get('addnewstation', 'ntcController@addNewStation');

Route::get('/editroute/{route_id}', ['uses'=>'ntcController@editRoute','as'=>'editRoute']);
Route::get('/editoperator/{operator_id}', ['uses'=>'ntcController@editOperator','as'=>'editOperator']);



































































































Route::get('operator_new_booking', function () {
    return view('operator.operator_new_booking');
});
Route::get('operator_cancel_booking', function () {
    return view('operator.operator_cancel_booking');
});
Route::get('operator_search_tickets', function () {
    return view('operator.operator_search_tickets');
})->middleware('operator_authentication');
Route::get('operator_show_tickets', function () {
    return view('operator.operator_show_tickets');
});
Route::get('operator_profile', function () {
    return view('operator.operator_profile');
});
Route::get('operator_signin', function () {
    return view('operator.operator_signin');
});
Route::get('operator', function () {
    return response()->view('operator.operator');
})->middleware('operator_authentication');



























































































































































































































































































Route::group(['middleware' => ['web']], function () {
    Route::post('/passenger_search', 'passenger_controller@passenger_search');
    Route::post('/passenger_cancel_final', 'passenger_controller@passenger_cancel_final');
    Route::post('/passenger_view', 'passenger_controller@passenger_view');
    
    Route::post('/passenger_signup', 'passenger_controller@passenger_signup');
    Route::post('/passenger_signin', 'passenger_controller@passenger_signin');
    Route::post('/passenger_cancel', 'passenger_controller@passenger_cancel');
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





    Route::post('/submitaddroute', 'ntcController@addRoute');
    Route::post('/submitaddoperator', 'ntcController@addOperator');
    Route::post('/submitaddstation', 'ntcController@addStation');

    Route::post('/submitIntermediate', 'ntcController@addIntermediate');




































































    Route::post('submit_nic', 'operatorController@getTicket');
    Route::post('submit_issue', 'operatorController@setIssue');
    Route::post('submit_reject', 'operatorController@setReject');
    Route::post('operator_profile', 'operatorController@getProfile');
    Route::post('operator_sign_in', 'operatorController@signIn');
    Route::get('operator_sign_out', 'operatorController@signOut');





























































































});







