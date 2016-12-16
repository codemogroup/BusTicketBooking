@extends('layout.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')

    <div id="routeaddform" style="padding-top: 5px">
        <div class="column-one">
            <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="I am route id" id="disabled" type="number" class="validate">
                        <label for="disabled">Route ID</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Enter Route Number" id="routeNo" type="text" class="validate">
                        <label for="routeNo">Route Number</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Enter Base Station " id="base" type="text" class="validate">
                        <label for="base">Base Station</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Enter Destination Staion" id="destination" type="text" class="validate">
                        <label for="destination">Destination Staion</label>
                    </div>
                </div>

                <a class="waves-effect waves-light btn"  href="/">Submit</a>

            </div>

        </div>
        <div class="column-two">

        </div>

    </div>


@endsection

