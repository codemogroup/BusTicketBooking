@extends('layout.passenger_master_plain')

@section('tab5')
    class="active "
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="post" action="/passenger_pay">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons">person</i>
                    <input name="full_name" type="text" class="validate" >
                    <label for="full_name">Full Name</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                <i class="material-icons">contacts</i>
                <input name="nic" type="text" class="validate" >
                <label for="nic">NIC</label>
            </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons">contact_phone</i>
                    <input name="telephone_no" type="text" class="validate" >
                    <label for="telephone_no">Telephone No</label>

                </div>
                <div class="input-field col s6">
                    <i class="material-icons">account_balance</i>
                    <input name="bank_no" type="text" class="validate" >
                    <label for="bank_no">Bank No</label>

                </div>
            </div>
            <div class="row">
                <label for="total_bill">Total Bill</label>
                <label for="amount">amount</label>

            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Pay
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