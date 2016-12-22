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
        @if(Session::has('message'))
            <div class="row container" style="margin-bottom: 5%">
                <div class="col-md-4 col-md-offset-4 success">
                    {{Session::get('message')}}
                </div>
            </div>
        @endif

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
            <div class="row container" >
                <div class="col s6" style="width: 70%;margin-left: 35%;margin-top: 2%">
                <button class="btn waves-effect waves-light" style="width: 100%; margin-right: 25%;background-color:  #2e6da4" type="submit" name="action">Search
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