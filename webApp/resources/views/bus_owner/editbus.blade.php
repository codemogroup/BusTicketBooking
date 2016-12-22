@extends('layout.owner')


@section('title')
    dit bus
@endsection
@section('tab2')
    class="active"
@endsection

@section('body')




    <div style="" class="container center" style="">
        {{--<h6>Add bus request</h6>--}}
        <form action="addbusrequest" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row input-field">
                <div class="input-field col s4">
                    <input id="number_plate" type="text" name="number_plate">
                    <label for="number_plate">Number plate</label>
                </div>
                <div class="input-field col s4">
                    <select name="type">
                        <option value="" disabled selected>Choose Bus type</option>
                        <option value="Normal">Normal</option>
                        <option value="Semi Luxery">Semi Luxery</option>
                        <option value="Luxery">Luxery</option>
                        <option value="Highway">Highway</option>
                    </select>
                </div>
            </div>
            <div class="row ">

                <div class="input-field  col s4">
                    <input id="seats" type="number" min=0 name="seats">
                    <label for="seats">Number of seats</label>
                </div>
                <div class="input-field  col s4">
                    <input id="seats_for_booking" type="number" min=0 name="seats_for_booking">
                    <label for="seats_for_booking">Number of seats for booking</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="from" type="text" name="from">
                    <label for="from">from</label>

                    <script type="text/javascript">
                        $('#from').autocomplete({
                            source: "autocompleteMainStation",
                            minlength: 1,
                            autoFocus: true
                        })
                    </script>

                </div>
                <div class="input-field col s4">
                    <input id="to" type="text" name="to">
                    <label for="to">To</label>
                </div>

                <script type="text/javascript">
                    $('#to').autocomplete({
                        source: "autocompleteMainStation",
                        minlength: 1,
                        autoFocus: true
                    })
                </script>
            </div>


            <button class="btn waves-effect waves-light col s12 z-depth-5"
                    style="background-color:  #2e6da4"
                    type="submit"> Send request

            </button>
        </form>
    </div>

@endsection