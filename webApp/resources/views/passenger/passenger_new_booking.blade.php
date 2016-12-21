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

    <div class="container" style="margin-top: 5%">
        <form action="submitbooking" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                <div class="input-field col s4">
                    <select required name="numOfSeats" class="validate" >
                        <option value="" disabled selected>Number of seats</option>
                        @for($i = 1; $i <= $available; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col s4 input-field">
                    <input type="text" class="validate" required name="passenger_id" id="passenger_id">
                    <label for="passenger_id">Please enter Your Id</label>
                </div>

                <div class="col s4" >
                    <button class="btn waves-effect waves-light col s12 z-depth-5"
                            style="background-color:  #2e6da4;margin-bottom: 0;height: 60px"
                            type="submit"> Create booking


                    </button>
                </div>
            </div>


        </form>
    </div>

@endsection
