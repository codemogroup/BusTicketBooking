@extends('layout.masterbasics')

@section('head')

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
@endsection
@section('body')

    <div class="carousel carousel-slider center" data-indicators="true">

        <div class="carousel-fixed-item row" style="width: 50%;margin-left: 25% ">
            <div class=" col s4">
                <a class="btn waves-effect white grey-text darken-text-2" style="height: 70px">Pessnger</a>
            </div>

            <div class="col s4">
                <a href="{{url('ownersignin')}}" class="btn waves-effect white grey-text darken-text-2"
                   style="height: 70px">Bus owner</a>
            </div>

            <div class="col s4 ">
                <a class="btn waves-effect white grey-text darken-text-2" style="height: 70px">Operator</a>
            </div>
        </div>
        <div class="carousel-item blue white-text" href="#one!">
            <h2>First Panel</h2>
            <p class="white-text">This is your first panel</p>
        </div>
        <div class="carousel-item black white-text" href="#two!">
            <h2>Second Panel</h2>
            <p class="white-text">This is your second panel</p>
        </div>
        <div class="carousel-item green white-text" href="#three!">
            <h2>Third Panel</h2>
            <p class="white-text">This is your third panel</p>
        </div>
        <div class="carousel-item white white-text" href="#four!">
            <h2>Fourth Panel</h2>
            <p class="white-text">This is your fourth panel</p>
        </div>
    </div>


@endsection