@extends('layout.operator_master')

@section('name')
    <p class="grey-text text-lighten-4">{{ $results->name }}</p>
@endsection

@section('tab5')
    class="active "
@endsection

@section('content')

    <img class="materialboxed" width="1000" height="400" src="bus.jpg" style=" padding-left: 200px">

@endsection
