@extends('layout.passenger_master_plain')

@section('tab5')
    class="active "
@endsection

@section('content')
    <table class="responsive-table">
        <thead>
        <tr>

            <th data-field="booking_id">Booking Id <i class="material-icons">card_membership</i></th>
            <th data-field="date">Date <i class="material-icons">date_range</i></th>
            <th data-field="bus_type">Bus Type <i class="material-icons">directions_bus</i></th>
            <th data-field="details">Details <i class="material-icons">attach_file</i></th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td><button class="btn waves-effect waves-light" type="submit" name="action">Check
                    <i class="material-icons right">send</i>
                </button></td>
        </tr>

        </tbody>
    </table>


@endsection