@extends('layout.passenger_master2')

{{-- content--}}
@section('header')
    @include('includes.passenger_header')
@endsection

@section('tab1')
    class="active"
@endsection

@section('content')

    <div class="container" style="margin-top: 9%">

        <form class="col s12" method="post" action="passengerSearch">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s6">

                    <i class="material-icons prefix">flight_takeoff</i>
                    <input name="from" id="from" type="text" class="validate" required>
                    <label for="from">From</label>
                    <script type="text/javascript">
                        $('#from').autocomplete({
                            source: "autocompleteIntermediateStation",
                            minlength: 1,
                            autoFocus: true
                        })
                    </script>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">flight_land</i>
                    <input name="to" type="text" id="to" class="validate" required>
                    <label for="to">To</label>
                    <script type="text/javascript">
                        $('#to').autocomplete({
                            source: "autocompleteIntermediateStation",
                            minlength: 1,
                            autoFocus: true
                        })
                    </script>
                </div>

            </div>
            <div class="row">
                <div class=" input-field col s6">
                    <i class="material-icons prefix">date_range</i>
                    <label for="date"></label>
                    <input type="date" class="datepicker" name="date" required>

                </div>




            </div>
<<<<<<< HEAD
            <div class="row container" >
                <div class="col s6" style="width: 70%;margin-left: 35%;margin-top: 2%">
                <button class="btn waves-effect waves-light" style="width: 100%; margin-right: 25%;background-color:  #2e6da4" type="submit" name="action">Search
=======
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action" href="/passenger_home">Search
                    <i class="material-icons right">send</i>
>>>>>>> 94c7cba88e3666f606e0245c4ae79adc8b8c02d0
                </button>
                </div>
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