<?php

//


Route::get('test', function () {
    return view('testview');
});


Route::get('autocompleteMainStation', 'commonController@autoCompleteMainStation');

Route::get('autocompleteIntermediateStation', 'commonController@autoCompleteIntermediateStation');


Route::post('/testing', 'busOwnerController@searchTest');

//Route::post('/ntcsearch/{x}', ['uses'=>'ntcController@search','as'=>'search']);

Route::get('/', function () {
    return view('welcome');
});




//





//operator routing ends


//


Route::get('/ownerreg', function () {
    return view('bus_owner.signup');
});


//Route::get('operator', function () {
//     return view('operator');
//
//});

//Route::get('/ownerhome', function () {
//    return view('bus_owner.bankAccount');
//})->name('ownerhome');


Route::get('/passenger_home', function () {
    return view('passenger.passenger_search');
});
Route::get('/passenger_search', function () {
    return view('passenger.passenger_search');
});
//Route::post('/passenger_search',function (){
//    return view('passenger.passenger_search');

//Route::get('ownerhome',function($email) {
//    return view('bus_owner.ownerhome')->with('email',$email);
//});




Route::get('ownersignup', function () {
    return view('bus_owner.signup');

});

Route::get('ownersignin', function () {
    return view('bus_owner.signin');

});
Route::get('signout', 'busOwnerController@signout');



Route::get('/passenger_new_booking', function () {
    return view('passenger.passenger_new_booking');
});

Route::get('/passenger_cancel_booking', function () {
    return view('passenger.passenger_cancel_booking');
});
Route::get('/passenger_view_booking', function () {
    return view('passenger.passenger_view_booking');
});
Route::get('/passenger_view_results', function () {
    return view('passenger.passenger_view_results');
});
Route::get('/passenger_cancel_results', function () {
    return view('passenger.passenger_cancel_results');
});
Route::get('passengerSearchResults', function () {
    return view('passenger.passenger_search_results');
});
Route::get('/passenger_seat_book', function () {
    return view('passenger.passenger_seat_book');
});
Route::get('/passenger_pay', function () {
    return view('passenger.passenger_pay');
});
Route::get('/passenger_signin', function () {
    return view('authentication.passenger_signin');
});
Route::get('/passenger_signup', function () {
    return view('authentication.passenger_signup');
});





Route::post('passengerSearch', 'passenger_controller@searchBuses');


Route::group(['middleware' => ['web']], function () {
    Route::post('/passenger_search', 'passenger_controller@passenger_search');
    Route::post('/passenger_cancel_final', 'passenger_controller@passenger_cancel_final');
    Route::post('/passenger_view', 'passenger_controller@passenger_view');

    Route::post('/passenger_signup', 'passenger_controller@passenger_signup');
    Route::post('/passenger_signin', 'passenger_controller@passenger_signin');
    Route::post('/passenger_cancel', 'passenger_controller@passenger_cancel');
    Route::get('/passenger_search', function () {
        return view('passenger.passenger_search');
    });
    Route::get('/passenger_new_booking', function () {
        return view('passenger.passenger_new_booking');
    });
    Route::get('/passenger_cancel_booking', function () {
        return view('passenger.passenger_cancel_booking');
    });
    Route::get('/passenger_view_booking', function () {
        return view('passenger.passenger_view_booking');
    });
    Route::get('/passenger_signin', function () {
        return view('authentication.passenger_signin');
    });
    Route::get('/passenger_signout', 'passenger_controller@passengerSignout'
    );
    Route::get('/passenger_signup', function () {
        return view('authentication.passenger_signup');
    });




    Route::get('ownerhome', 'busOwnerController@getBankDetails')->middleware('authentication');







    Route::post('addbusrequest', 'busOwnerController@addBusRequest');

    Route::post('confirmbooking', 'passenger_controller@confirmBooking');





    Route::post('submit_nic', 'operatorController@getTicket');
    Route::post('submit_issue', 'operatorController@setIssue');
    Route::post('submit_reject', 'operatorController@setReject');
    Route::get('operator_profile', 'operatorController@getProfile');
    Route::post('operator_sign_in', 'operatorController@signIn');
    Route::get('operator_sign_out', 'operatorController@signOut');
    Route::post('submit_password', 'operatorController@changePassword');









    Route::post('/submitaddroute', 'ntcController@addRoute');
    Route::post('/submitaddoperator', 'ntcController@addOperator');
    Route::post('/submitaddstation', 'ntcController@addStation');
    Route::post('ntc_signin', 'ntcController@signIn');
    Route::post('/submitIntermediate', 'ntcController@addIntermediate');
    Route::post('/savenewoperatorstation', 'ntcController@saveNewOperatorStation');

////////////////////////NTC routing starts



});
////////////////////////NTC routing ends


Route::get('ownerbank', 'busOwnerController@getBankDetails');

Route::get('owneraddbus', 'busOwnerController@getaddBus');

Route::get('editbus', function () {
    return view('bus_owner.editbus');
});

Route::post('submitbooking', 'passenger_controller@submitBooking');

Route::post('submitownersignin', 'busOwnerController@signIn');

Route::post('editbus', 'busOwnerController@editBus');

Route::get('ntc', function () {

    return view('NTC.ntc');

});

Route::get('ntcsignin', function () {
    return view('NTC.signIn');
});

Route::get('ntctime', function () {
    return view('NTC.ntcTimeTable');
});

Route::get('searchbus', function () {
    return view('NTC.ntcsearchBus');
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
Route::get('busrequests', 'ntcController@busRequests');
Route::get('allroutes', 'ntcController@allRoutes');
Route::get('allstations', 'ntcController@allStations');
Route::get('changeindex', 'ntcController@index');
Route::post('/ntcsearch/{x}', ['uses'=>'ntcController@search','as'=>'search']);
Route::post('/bussearch/{x}', ['uses'=>'ntcController@busSearch','as'=>'bsearch']);
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
Route::post('operator_show_profile', function () {
    return view('operator.operator_show_profile');
});
Route::get('operator_signin', function () {
    return view('operator.operator_signin');
});
Route::get('operator', function () {
    return response()->view('operator.operator');
})->middleware('operator_authentication');
Route::get('operator_change_password', function () {
    return view('operator.operator_change_password');
});

