@extends('layout.masterbasics')


@section('title')
    Bank Account
@endsection
@section('head')
    <style>
        .marginedit{
            margin-top: 200px;
        }
    </style>
@endsection

@section('tab2')
    class="active"
@endsection
@section('body')

    @include('bus_owner.includes.tabedHeader')


    <div class="container marginedit">
        <form class="" action="/addbankaccount" method="post">
            <div class="row">
                <div class="input-field  col s6">
                    <input id="accountnum" name='accountnum' type="text">
                    <label for="accountnum"> Enter your account number</label>
                </div>

                <div class="input-field col s4 center">
                    {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                    <button class="btn waves-effect waves-light col s12 z-depth-5" style="background-color:  #2e6da4"
                            type="submit">Add acount
                    </button>
                </div>
            </div>

            <div class="row">

            </div>
        </form>
    </div>



@endsection