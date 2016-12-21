@extends('layout.masterbasics')


@section('title')
    Home
@endsection

@section('body')
    @include('bus_owner.includes.tabedHeader')


    <div class="container" >
        <div id="home"></div>
        <div id="bankaccount" style="margin-top: 200px">@include('bus_owner.bankAccount')</div>
        <div id="addbus">@include('bus_owner.addbus')</div>
        <div id="editbus"></div>
    </div>


@endsection



