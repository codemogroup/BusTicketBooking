@extends('layout.owner')


@section('title')
    Bank account
@endsection
@section('tab1')
    class="active"
@endsection

@section('body')





<div class="container" style="margin-top: 5%">

    <div class="">
    <div class="row">
        <div class="col s8" style=" font-size: 18pt">
            <div class="row">{{$message}}</div>
            @if($true)
                <div class="row">{{$message2}}</div>
            @else
                {{'Add your bank acoount'}}

            @endif



        </div>

        <div class="col s2" style="float:right; margin-right: 5px">
            <form class="" action="/addbankaccount" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <input type="hidden" name="email" value="{{ $email }}">

{{--{{$email}}--}}
                <div class="row">
                    <div class="input-field  col s12">
                        <input id="accountnum" name='accountnum' type="text">
                        <label for="accountnum">
                            @if($true)
                                {{'change account'}}
                            @else
                                {{'Add your bank acoount'}}

                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center">
                        {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                        <button class="btn waves-effect waves-light col s12 z-depth-5"
                                style="background-color:  #2e6da4"
                                type="submit">
                            @if($true)
                                {{'Change'}}
                            @else
                                {{'Add acoount'}}

                            @endif
                        </button>
                    </div>
                </div>


            </form>

        </div>
    </div>


</div>
</div>
@endsection