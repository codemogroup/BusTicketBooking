@extends('layout.master')

@section('content')
<div class="container">
    <ul>
        {{--<li href="{{route('')}}">Pessenger</li>--}}
        <li><a href="{{url('ownersignin')}}">Bus owner</a></li>
        {{--        <li href="{{route('')}}">Operator</li>--}}
    </ul>

</div>

@endsection