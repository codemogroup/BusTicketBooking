@extends('layout.master')

@section('title')
    Control Panel:Operator
@endsection

@section('logo')
    Operator
@endsection


{{--// links in the right top corner--}}

@section('Link1')
    Profile
@endsection

@section('Link2')
    Settings
@endsection

@section('Link3')
    Sign Out
@endsection

{{--// tabs in navbar--}}

@section('Tab1')
    new booking
@endsection

@section('Tab2')
    issue tickets
@endsection

@section('Tab3')
    cancel booking
@endsection

@section('Tab4')
    verify journey
@endsection

{{-- content--}}

@section('content')

@endsection

 {{--footer--}}

@section('Line1')
    Signed in as
@endsection

@section('Line2')
    Username
@endsection