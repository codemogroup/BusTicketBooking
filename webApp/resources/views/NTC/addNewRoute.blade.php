@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')

    <div id="signup-page" class="row">
        <div class="col s12 z-depth-6 card-panel" style="padding: 3%">
            <form class="login-form r" style="color: #2e6da4; margin-left: 2%;width: 80%" method="post" action="/submitaddroute">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">

                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="routeid" type="number" name="routeid">
                        <label for="routeid">Route ID</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="routeNo" type="text" name="routeNo">
                        <label for="routeNo">Route No</label>
                    </div>
                </div>

                <div class="row margin">


                    <div class="input-field col s4">

                        <input id="first" type="number" name="first">
                        <label for="first">First Station</label>
                    </div>

                </div>
                <div class="row margin">


                    <div class="input-field col s4">

                        <input id="second" type="number" name="second">
                        <label for="second">Second</label>
                    </div>

                </div>



                <div class="row">
                    <div class="input-field col s10 center" style="width: 70%;margin-left: 15%">
                        {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                        <button class="btn waves-effect waves-light col s12" style="background-color:  #2e6da4"
                                type="submit">Submit
                        </button>
                    </div>
                </div>

            </form>




        </div>


    </div>




@endsection

