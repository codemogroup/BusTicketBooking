@extends('layout.passenger_master')

{{-- content--}}


@section('tab3')
    class="active"
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="post" action="/passenger_search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <input name="base_station" type="text" class="validate" >
                    <label for="base_station">Base Station</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_off</i>
                    <input name="destination" type="text" class="validate" >
                    <label for="destination">Destination</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <i class="material-icons prefix">date_range</i>
                    <label for="journey_date">Date</label>
                    <input type="date" class="datepicker" name="journey_date">

                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">directions_bus</i>
                        <select name="bus_type">
                            <option value="" disabled selected>Choose your Bus Type</option>
                            <option value="highway">HighWay</option>
                            <option value="ac">Air Conditioned</option>
                            <option value="semi">Semiluxury</option>
                            <option value="normal">Normal</option>
                        </select>

                </div>



            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Search
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
        @if(count($errors))
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>




@endsection