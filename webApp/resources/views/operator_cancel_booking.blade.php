@extends('layout.operator_master')

{{-- content--}}


@section('tab3')
    class="active"
@endsection

@section('content')
    <div class="row"">
    <div class="col s3" id ="leftSide">
        <div class="row" style="padding:30px ">
            <div class="input-field">
                <input placeholder="Enter here" id="first_name2" type="text" class="validate">
                <label class="active" for="first_name2" style="font-size: large">NIC Number</label>
            </div>

        </div>

        <div class="row" style="padding-left:30px">
            <button class="btn waves-effect waves-light" type="submit" name="action">Check
                <i class="material-icons right">search</i>
            </button>

        </div>
    </div>
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
            <button class="btn waves-effect waves-light" type="submit" name="action">cancel
                <i class="material-icons right">cancel</i>
            </button>
        </div>
    </div>
    </div>
@endsection
