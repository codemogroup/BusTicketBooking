@extends('layout.passenger_master_plain')

@section('tab5')
    class="active "
@endsection

@section('content')
    <div class="container col">
        <table class="responsive-table centered highlight">
            <thead>
            <tr>
                <div>
                    <th style="color: #204d74" class="col s1" data-field="no">Number <i
                                class="material-icons prefix"></i></th>
                    <th style="color: #204d74" class="col s2" data-field="licence_no">Bus No <i
                                class="material-icons prefix">featured_play_list</i>
                    </th>
                    <th style="color: #204d74" class="col s2" data-field="time">Time <i class="material-icons prefix">date_range</i>
                    </th>
                    <th style="color: #204d74" class="col s2" data-field="type">Type <i class="material-icons prefix">card_membership</i>
                    </th>
                    <th style="color: #204d74" class="col s2" data-field="available">Available seats <i
                                class="material-icons prefix">event_available</i></th>
                    <th style="color: #204d74" class="col s3" data-field="book">Book <i class="material-icons prefix">shopping_cart</i>
                    </th>
                </div>
            </tr>
            </thead>

            <tbody>
            <p style="margin-left:29%;color: #204d74;font-size: 200%">Date: {{$date}} </p>
            @php

                $index=0;
            @endphp
            @foreach ($buses as $bus)
                @php
                    $index=$index+1;
                @endphp

                <tr>
                    <td>{{$index}}</td>
                    <td>{{$bus['bus_no']}}</td>
                    <td>{{$bus['bus_type']}}</td>
                    <td>{{$bus['time']}}</td>
                    <td>{{$bus['available']}}</td>
                    <td>
                        <form action="addBooking" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="date" value="{{$date}}">
                            <input type="hidden" name="bus_id" value="{{$bus['bus_id']}}">
                            <input type="hidden" name="journey_id" value="{{$bus['journey_id']}}">
                            <input type="hidden" name="from" value="{{$from}}">
                            <input type="hidden" name="to" value="{{$to}}">
                            <input type="hidden" name="direction" value="{{$direction}}">
                            <input type="hidden" name="type" value="{{$bus['bus_type']}}">
                            <input type="hidden" name="bus_no" value="{{$bus['bus_no']}}">
                            <input type="hidden" name="time" value="{{$bus['time']}}">


                            <button type="submit" class="btn" style="background-color:  #2e6da4">book <i class="material-icons prefix">add_shopping_cart</i></button>
                        </form>
                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
@endsection