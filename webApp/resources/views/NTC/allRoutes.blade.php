@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')

    <table class="highlight bordered responsive-table" style="padding: 50px">
        <thead>
        <tr style="background-color: rgba(71, 58, 83, 0.29)">
            <th data-field="routeNO">Route No</th>
            <th data-field="station1">Base Station</th>
            <th data-field="station2">End Station</th>

        </thead>

        <tbody>

        @foreach($results as $results)

            <tr>
                <td> {{ $results->route_no }}</td>
                <td>{{$results->station1}}</td>
                <td>{{ $results->station2}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>



@endsection