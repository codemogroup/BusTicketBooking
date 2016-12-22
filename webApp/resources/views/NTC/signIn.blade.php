@extends('layout.master')

@section('logo')
    Sign In
@endsection
@section('content')
    <div class="row">
        <div class="col s2" id ="leftSide">


        </div>


        <div class="col s8" id ="Middle" style="padding-top:30px">
            <form class="login-form row" style="color: #2e6da4; margin-left: 10%;width: 80%" method="post" action="ntc_signin">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">perm_identity</i>
                        <input class="validate" id="id" type="number" name="id">
                        <label for="id" data-error="wrong id" data-success="right">Admin ID</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s10 center" style="width: 70%;margin-left: 15%">
                        {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                        <button class="btn waves-effect waves-light col s12 z-depth-5" style="background-color:  #2e6da4"
                                type="submit">Sign In
                        </button>
                    </div>
                </div>



            </form>
        </div>


        <div class="col s2" id ="rightSide" style="padding-top:200px">

        </div>
    </div>
@endsection
