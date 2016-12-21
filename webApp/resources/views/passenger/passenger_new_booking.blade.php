@extends('layout.passenger_master2')

{{-- content--}}
@section('header')
    @include('includes.addbookingheader')
@endsection

@section('tabcontent')
    ADD Booking
@endsection

@section('tab2')
    class="active"
@endsection

@section('content')

    {{--{{$date}}--}}
    {{--{{$journey_id}}--}}
    {{--{{$bus_id}}--}}
    {{--{{$bus_no}}--}}
    {{--{{$from}}--}}
    {{--{{$to}}--}}
    {{--{{$direction}}--}}
    {{--{{$type}}--}}
    <div class="container" style="margin-top: 5%">
        <form action="">
            <div class="row ">
                <div class="col s4 input-field">
                    <input type="text" id="date" readonly name="date" value="{{$date}}">
                    <label for="date">Date</label>
                </div>

                <div class="col s4 input-field">
                    <input type="text" id="bus_id" readonly name="bus_id" value="{{$bus_no}}">
                    <label for="bus_id">Bus Number</label>
                </div>

                <div class="col s4 input-field">
                    <input type="text" id="type" readonly name="type" value="{{$type}}">
                    <label for="type">Type</label>
                </div>
            </div>
            <div class="row ">
                <div class="col s4 input-field">
                    <input type="text" id="from" readonly name="from" value="{{$from}}">
                    <label for="from">From</label>
                </div>

                <div class="col s4 input-field">
                    <input type="text" id="to" readonly name="to" value="{{$to}}">
                    <label for="to">To</label>
                </div>

                <div class="col s4 input-field">
                    <input type="text" id="time" readonly name="time" value="{{$time}}">
                    <label for="time">Time</label>
                </div>
                <input type="hidden" name="journey_id" value="{{$journey_id}}">
                <input type="hidden" name="bus_id" value="{{$bus_id}}">
                <input type="hidden" name="direction" value="{{$direction}}">
            </div>
            <div class="row ">
                <div class="col s4 input-field">
                    <select class="validate" required name="passenger_id" id="passenger_id"></select>
                    <label for="passenger_id">Please enter Your Id</label>
                </div>

                <div class="col s4 input-field">
                    <input class="validate" required type="text" id="seat"  name="bus_id" ">
                    <label for="bus_id">Bus Number</label>
                </div>

                <div class="col s4 input-field">
                    <input class="validate" required type="text" id="type"  name="type">
                    <label for="type">Type</label>
                </div>
            </div>

        </form>
    </div>
    <div style="float: right">
        <div class="row">
            <div style="width: 50px;background-color: #337ab7;border: 5px solid #c7254e;text-align:center">1</div>
        </div>
    </div>
@endsection
