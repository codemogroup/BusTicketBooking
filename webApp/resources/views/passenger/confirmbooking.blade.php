@extends('layout.masterbasics')


@section('body')


    <div class="container" style="margin-top: 15%;width: 70%;margin-left: 15%">
        <form action="confirmbooking" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row input-field">
                <div class="input-field col s4">
                    <input id="unit" type="text" name="unit" readonly value="{{$unitPrice}}">
                    <label for="unit">Unit Price</label>
                </div>
                <div class="input-field col s4">
                    <input id="seats" type="text" name="seats"readonly value="{{$seats}}">
                    <label for="seats">Seats</label>
                </div>
                <div class="input-field col s4">
                    <input id="total" type="text" name="total" readonly value="{{$total}}">
                    <label for="seats">Total</label>
                </div>

            </div>

            <input type="hidden" name="date" value="{{$date}}">
            <input type="hidden" name="bus_id" value="{{$bus_id}}">
            <input type="hidden" name="journey_id" value="{{$journey_id}}">
            <input type="hidden" name="fare_id" value="{{$fare_id}}">
            <input type="hidden" name="customer_id" value="{{$customer_id}}">
            <input type="hidden" name="seats" value="{{$seats}}">



            <button class="btn waves-effect waves-light col s12 z-depth-5"
                    style="background-color:  #2e6da4;float: right"
                    type="submit"> Send request

            </button>
        </form>
    </div>


@endsection