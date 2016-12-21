@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')

    <table class="highlight bordered responsive-table" style="padding: 5px">
        <thead>
        <tr style="background-color: rgba(71, 58, 83, 0.29)">
            <th data-field="id">ID</th>
            <th data-field="name">Name</th>
            <th data-field="nic">NIC</th>
            <th data-field="telephone">Telephone NO</th>
            <th data-field="address">Address</th>
            <th data-field="email">E-Mail</th>
            <th data-field="sation">Station</th>


        </thead>

        <tbody>

        @foreach($results as $results)

            <tr>
                <td> {{ $results->operator_id }}</td>
                <td>{{$results->name}}</td>
                <td>{{ $results->nic}}</td>
                <td> {{ $results->telephone }}</td>
                <td>{{$results->address}}</td>
                <td>{{ $results->email}}</td>
                <td>{{ $results->station}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>



@endsection