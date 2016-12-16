@extends('layout.operator_master')

{{-- content--}}


@section('tab4')
    class="active"
@endsection

@section('content')

    <table class="highlight bordered responsive-table" style="padding: 5px">
        <thead>
        <tr style="background-color: rgba(71, 58, 83, 0.29)">
            <th data-field="number">Bus Number</th>
            <th data-field="from">From</th>
            <th data-field="to">To</th>
            <th data-field="journey">Journey</th>
            <th data-field="status">Verified Status</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td>
                <button class="btn waves-effect waves-light" type="submit" name="action">departed
                    <i class="material-icons right">check_circle</i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action">not arrived
                    <i class="material-icons right">cancel</i>
                </button>
            </td>
            <td>arrived</td>
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
    <table class="highlight bordered responsive-table" style="padding: 5px">
        <thead>
        <tr style="background-color: rgba(71, 58, 83, 0.29)">
            <th data-field="number">Bus Number</th>
            <th data-field="from">From</th>
            <th data-field="to">To</th>
            <th data-field="journey">Journey</th>
            <th data-field="status">Verified Status</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td>
                <button class="btn waves-effect waves-light" type="submit" name="action">departed
                    <i class="material-icons right">check_circle</i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action">not arrived
                    <i class="material-icons right">cancel</i>
                </button>
            </td>
            <td>arrived</td>
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
