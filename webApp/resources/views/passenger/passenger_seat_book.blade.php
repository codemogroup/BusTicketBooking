@extends('layout.passenger_master_plain')

@section('tab5')
    class="active "
@endsection

@section('content')
    <table class="responsive-table">
        <thead>
        <tr>

            <th data-field="seat_no">Seat No<i class="material-icons">airline_seat_recline_normal</i></th>
            <th data-field="book">Book <i class="material-icons">add_box</i></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>
                <p>
                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                    <label for="filled-in-box"></label>
                </p>
            </td>
        </tr>
        </tbody>


    </table>
    <div class="row">
        <button class="btn waves-effect waves-light" type="submit" name="action">Ok
            <i class="material-icons right">send</i>
        </button>
    </div>

@endsection