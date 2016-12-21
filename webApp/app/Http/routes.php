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



















































































//uwin done



































































































//aminda done







































































Route::post('passengerSearch','passenger_controller@searchBuses');
Route::post('submitbooking','passenger_controller@submitBooking');


Route::get('/passenger_new_booking',function (){
    return view('passenger.passenger_new_booking');
});

Route::post('confirmbooking', 'passenger_controller@confirmBooking');








//owner routes

//Route::get('/ownerhome',function (){
//    return view('bus_owner.bankAccount');
//})->name('ownerhome');

Route::get('ownerhome', 'busOwnerController@getBankDetails')->middleware('authentication');

Route::post('addBooking','passenger_controller@addBooking');


Route::get('ownersignup', function () {
    return view('bus_owner.signup');

});
Route::get('ownersignin', function () {
    return view('bus_owner.signin');

});


Route::get('signout','busOwnerController@signout');




Route::post('addbusrequest', 'busOwnerController@addBusRequest');



Route::get('ownerbank', 'busOwnerController@getBankDetails');

Route::get('owneraddbus', 'busOwnerController@getaddBus');


Route::get('editbus', function () {
    return view('bus_owner.editbus');
});








Route::get('/', function () {
    return view('welcome');
});

Route::get('autocompleteMainStation','commonController@autoCompleteMainStation');

Route::get('autocompleteIntermediateStation','commonController@autoCompleteIntermediateStation');




Route::get('test', function (){
    return view('testview');
});





Route::group(['middleware' => ['web']], function () {
    Route::post('/submitownersignup', 'busOwnerController@createOwner');
    Route::post('/submitownersignin','busOwnerController@signIn');
    Route::post('addbankaccount', 'busOwnerController@addAccount');
    
    Route::post('/submitsigninowner', 'busOwnerController@createOwner');
//    Route::post('/passenger_search', 'passenger_controller@passenger_search');

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

});







