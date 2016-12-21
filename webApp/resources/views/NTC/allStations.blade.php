@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')
    <div style="padding: 10px">

        <table class="highlight bordered responsive-table" >
            <thead>
            <tr style="background-color: rgba(71, 58, 83, 0.29)">
                <th data-field="stationID">Station ID</th>
                <th data-field="name">Station Name</th>


            </thead>

            <tbody>

            @foreach($results as $result)

                <tr>
                    <td> {{ $result->station_id }}</td>
                    <td>{{$result->station}}</td>

                </tr>

            @endforeach

            </tbody>
        </table>

    </div>



@endsection