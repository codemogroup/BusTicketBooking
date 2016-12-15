@extends('../layout.master')

@section('logo')
    Sign Up
@endsection
@section('content')

    <div id="signup-page" class="row" >
        <div class="col s12 z-depth-6 card-panel" style="padding: 3%">
            <form class="login-form">
                <div class="row">

                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input class="validate" id="name" type="text">
                        <label for="name" >Name</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input class="validate" id="email" type="email">
                        <label for="email" data-error="wrong" data-success="right" >Email</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input class="validate" id="email" type="email">
                        <label for="email" data-error="wrong" data-success="right" >Email</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input type="checkbox" id="remember-me"/>
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                        <button class="btn waves-effect waves-light col s12" style="background-color:  #2e6da4" type="submit">Sign up</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin  medium-small sign-up">Already have an account? <a href="login.html">Login</a></p>
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