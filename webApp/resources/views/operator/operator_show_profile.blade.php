@extends('layout.operator_master')

{{-- content--}}


@section('tab3')
    class="active"
@endsection

@section('content')
    <div class="row">
    <div class="col s2" id ="leftSide">


    </div>


    <div class="col s8" id ="Middle" style="padding-top:30px">
        <div class="row" style="padding:3px" >
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)" >
                ID
            </div>
            <div class="col s6">
                {{$results->operator_id}}
            </div>
        </div>
        <div class="row" style="padding:3px ">
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                Name
            </div>
            <div class="col s6">
                {{ $results->name}}
            </div>

        </div>
        <div class="row" style="padding:3px ">
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                NIC
            </div>
            <div class="col s6">
                {{$results->nic}}
            </div>

        </div>
        <div class="row" style="padding:5px ">
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                Telephone Station
            </div>
            <div class="col s6">
                {{$results->telephone}}
            </div>

        </div>

        <div class="row" style="padding:5px ">
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                Adress
            </div>
            <div class="col s6">
                {{$results->address}}
            </div>

        </div>

        <div class="row" style="padding:5px ">
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                E-mail
            </div>
            <div class="col s6">
                {{$results->email}}
            </div>

        </div>
        <div class="row" style="padding:5px ">
            <div class="col s6" style="background-color: rgba(71, 58, 83, 0.2)">
                Station
            </div>
            <div class="col s6">
                {{$results->station}}
            </div>

        </div>
    </div>


    <div class="col s2" id ="rightSide" style="padding-top:200px">

    </div>
    </div>
@endsection
