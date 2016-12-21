@extends('layout.passenger_master')

{{-- content--}}


@section('tab3')
    class="active"
@endsection

@section('content')
    <div class="container">
        <div class="container" style="margin-top: 10%">
            <form class="" method="post" action="/passenger_view">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">supervisor_account</i>
                        <input name="your_nic" type="text" class="validate">
                        <label for="your_nic">Your NIC</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action" style="float: left">
                            Search
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
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
    </div>
@endsection