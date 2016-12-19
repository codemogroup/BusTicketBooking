@extends('layout.passenger_master')

{{-- content--}}


@section('tab2')
    class="active"
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="post" action="/passenger_cancel">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">supervisor_account</i>
                    <input name="your_nic" type="text" class="validate" >
                    <label for="your_nic">Your NIC</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Search
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
        @if(count($errors))
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

