@extends('layout.operator_master')

{{-- content--}}


@section('tab2')
    class="active"
@endsection

@section('content')

    <!--
    <div class="row">
        <div class="col s3" id ="leftSide">
            <div class="row" style="padding:30px ">
                <div class="input-field">
                    <input placeholder="Enter here" id="nic" type="text" class="validate">
                    <label class="active" for="first_name2" style="font-size: large">NIC Number</label>
                </div>

            </div>

            <div class="row" style="padding-left:30px">
                <button class="btn waves-effect waves-light" type="submit" name="action">Check
                    <i class="material-icons right">search</i>
                </button>

            </div>
        </div>
        <div class="col s6" id ="Middle" style="padding-top:30px">
            <div class="row" style="padding:3px" >
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)" >
                    Name
                </div>
                <div class="col s6">

                </div>
            </div>
            <div class="row" style="padding:3px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Bus
                </div>
                <div class="col s6">

                </div>

            </div>
            <div class="row" style="padding:3px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    From
                </div>
                <div class="col s6">

                </div>

            </div>
            <div class="row" style="padding:3px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    To
                </div>
                <div class="col s6">

                </div>

            </div>
            <div class="row" style="padding:5px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Seats
                </div>
                <div class="col s6">

                </div>

            </div>

            <div class="row" style="padding:5px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Seat Numbers
                </div>
                <div class="col s6">

                </div>

            </div>

            <div class="row" style="padding:5px ">
                <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                    Total Amount
                </div>
                <div class="col s6">

                </div>

            </div>
        </div>
        <div class="col s3" id ="rightSide" style="padding-top:200px">
            <div class="row" style="padding:5px ">
                <button class="btn waves-effect waves-light" type="submit" name="action">issue
                    <i class="material-icons right">check_circle</i>
                </button>
            </div>
        </div>
    </div>   -->

    <table class="highlight bordered responsive-table" style="padding: 5px">
        <thead>
        <tr style="background-color: rgba(71, 58, 83, 0.29)">
            <th data-field="date">date</th>
            <th data-field="nic">NIC</th>
            <th data-field="name">Name</th>
            <th data-field="number">Bus Number</th>
            <th data-field="time">Time</th>
            <th data-field="from">From</th>
            <th data-field="to">To</th>
            <th data-field="seats">Seat Numbers</th>
            <th data-field="fare">Fare</th>
            <th data-field="status">Status</th>
        </tr>
        </thead>

        <tbody>

        @foreach($results as $results)

        <tr>
            <td> {{ $results->date }}</td>
            <td>{{$results->nic}}</td>
            <td>{{ $results->name}}</td>
            <td> {{ $results->plateNo }}</td>
            <td> {{ $results->time }}</td>
            <td> {{ $results->station1 }}</td>
            <td> {{ $results->station2 }}</td>
            <td> {{ $results->seats }} </td>
            <td>
                @if ( $results->type == 'highway') {
                    {{$results->price_highway}}
                }@else
                    {{$results->price_normal}}
                @endif
            </td>
            <td>
                <button class="btn waves-effect waves-light" type="submit" name="action">issue
                    <i class="material-icons right">check_circle</i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action">reject
                    <i class="material-icons right">cancel</i>
                </button>
            </td>
        </tr>



        @endforeach

        </tbody>
    </table>
@endsection
