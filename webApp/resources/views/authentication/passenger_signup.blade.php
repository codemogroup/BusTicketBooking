@extends('../layout.master')

@section('logo')
    Sign Up
@endsection
@section('content')

    <div id="signup-page" class="row">
        <div class="col s12 z-depth-6 card-panel" style="padding: 3%"  >
            <form class="login-form r" style="color: #2e6da4; margin-left: 10%;width: 80%" method="post" action="passenger_signup">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">

                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">perm_identity</i>
                        <input name="passenger_name" type="text">
                        <label for="passenger_name">Name</label>
                    </div>

                    <div class="input-field col s4">
                        {{--<i class="prefix"></i>--}}
                        <i class="material-icons prefix">featured_video</i>
                        <input  name="nic" type="text">
                        <label for="nic">NIC</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">location_on</i>
                        <input name="address" type="text">
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="row margin">


                    <div class="input-field col s12">
                        <i class="material-icons prefix">phone</i>
                        <input name="telephone" type="text">
                        <label for="telephone">Telephone</label>
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text" style="margin-left: 2.6%">
                        <input type="checkbox" id="remember-me"/>
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 center" style="width: 70%;margin-left: 15%">
                        {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                        <button class="btn waves-effect waves-light col s12" style="background-color:  #2e6da4"
                                type="submit">Sign up
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection