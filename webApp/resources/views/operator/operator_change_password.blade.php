@extends('layout.operator_master')

{{-- content--}}


@section('tab2')
    class="active"
@endsection

@section('content')
    <div class="row">

        <div class="col s4" id ="leftSide">
            {{--empty column--}}
        </div>

        <div class="col s3" id ="middle" style="padding-top: 1px">
            <form class="col s12" method="post" action="submit_password">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row" style="padding:10px ">
                    <div class="input-field">
                        <input placeholder="Enter here" id="password_old" name="password_old" type="password" class="validate">
                        <label class="active" for="first_name2" style="font-size: large">Current Password</label>
                    </div>

                </div>
                <div class="row" style="padding:10px ">
                    <div class="input-field">
                        <input placeholder="Enter here" id="password_new" name="password_new" type="password" class="validate">
                        <label class="active" for="first_name2" style="font-size: large">New Password</label>
                    </div>

                </div>
                <div class="row" style="padding:10px ">
                    <div class="input-field">
                        <input placeholder="Enter here" id="password_confirm" name="password_confirm" type="password" class="validate">
                        <label class="active" for="first_name2" style="font-size: large">Confirm Password</label>
                    </div>

                </div>

                <div class="row" style="padding-left:30px">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Change
                        <i class="material-icons right">done</i>
                    </button>

                </div>
            </form>

        </div>
        <!--
        <div class="col s6" id ="Middle" style="padding-top:30px">
            <div class="row" style="padding:3px" >
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)" >
                    Name
                </div>
                <div class="col s6">
                    fghb
                </div>
            </div>
            <div class="row" style="padding:3px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    From
                </div>
                <div class="col s6">

                </div>

            </div>
            <div class="row" style="padding:3px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    To
                </div>
                <div class="col s6">

                </div>

            </div>
            <div class="row" style="padding:5px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Seats
                </div>
                <div class="col s6">

                </div>

            </div>

            <div class="row" style="padding:5px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Seat Numbers
                </div>
                <div class="col s6">

                </div>

            </div>

            <div class="row" style="padding:5px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Total Amount
                </div>
                <div class="col s6">

                </div>

            </div>
        </div>

        <div class="col s3" id ="rightSide" style="padding-top:200px">
            <div class="row" style="padding:5px ">
                <button class="btn waves-effect waves-light" type="submit" name="action">issue
                    <i class="material-icons right">check_circle</i>
                </button>
            </div>
        </div>
        -->
    </div>
@endsection
