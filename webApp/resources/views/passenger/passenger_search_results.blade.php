@extends('layout.passenger_master_plain')

@section('tab5')
    class="active "
@endsection

@section('content')
    <table class="responsive-table">
        <thead>
        <tr>

            <th data-field="licence_no">Licence No<i class="material-icons">card_membership</i></th>
            <th data-field="time">Time<i class="material-icons">date_range</i></th>
            <th data-field="book">Book <i class="material-icons">add_box</i></th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
        </tr>
        <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
        </tr>
        <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
        </tr>
        </tbody>
    </table>


@endsection