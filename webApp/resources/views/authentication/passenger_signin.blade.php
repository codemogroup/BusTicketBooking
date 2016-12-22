@extends('../layout.master')

@section('logo')
    Sign In
@endsection
@section('content')

    <div id="signup-page" class="row">
        <div class="col s12 z-depth-6 card-panel" style="padding: 3%">
            <form class="login-form r" style="color: #2e6da4; margin-left: 10%;width: 80%" method="post" action="/passenger_signin" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input class="validate" name="nic" type="text">
                        <label for="nic" data-error="wrong" data-success="right">National Identity Card</label>
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
                                type="submit">Sign In
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="/passenger_signup">Register Now!</a></p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="forgot-password.html">Forgot password?</a>
                        </p>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection