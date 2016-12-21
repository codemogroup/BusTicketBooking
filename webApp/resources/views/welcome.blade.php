@extends('layout.masterbasics')

@section('head')

    <style>

    </style>

@endsection
@section('body')
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="https://images7.alphacoders.com/317/317196.jpg"> <!-- random image -->
                <div class="caption right-align">
                    <h3>Travel to anywhere</h3>
                    <h5 class="light grey-text text-lighten-3">Now it's easy.</h5>
                </div>
            </li>
            <li>
                <img src="https://s-media-cache-ak0.pinimg.com/originals/ec/c6/03/ecc6034a61eaa29bf829189271732be3.jpg"> <!-- random image -->
                <div class="caption left-align">
                    <h3>Book seats from anywhere</h3>
                    <h5 class="light grey-text text-lighten-3">We will keep it for you</h5>
                </div>
            </li>
            <li>
                <img src="https://s-media-cache-ak0.pinimg.com/originals/35/da/cf/35dacf9e6a04cac6c446df87e0a9e504.jpg"> <!-- random image -->
                <div class="caption left-align">
                    <h3>Islandwide service</h3>
                    <h5 class="light grey-text text-lighten-3">Keep it booked.</h5>
                </div>
            </li>
            <li>
                <img src="http://wallpapercave.com/wp/FV9OQOg.jpg"> <!-- random image -->
                <div class="caption right-align">
                    <h3>This is the new way to travel</h3>
                    <h5 class="light grey-text text-lighten-3">Travel with us.</h5>
                </div>
            </li>
        </ul>
    </div>
    <div class="row container">

        <a class="col s4 btn" style="height: 60px" href="ownersignin">Bus owner</a>
        <a class="col s4 btn" style="height: 60px" href="passenger_home">Book Now</a>
        <a class="col s4 btn" style="height: 60px" href="">Operator</a>

    </div>
    <script>
        $(document).ready(function () {
            $('.slider').slider({full_width: true,interval: 1000});
        });
    </script>
@endsection