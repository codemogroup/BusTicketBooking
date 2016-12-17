@extends('layout.passenger_master')

{{-- content--}}


@section('tab3')
    class="active"
@endsection

@section('content')
    <div class="row">
        <form class="col s12">
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
    </div>
@endsection

