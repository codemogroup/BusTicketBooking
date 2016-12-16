@extends('layout.ntcmaster')

@section('title')
    NIC Time Table
@endsection

@section('content')

    <div class="row" style="padding-top: 5px">
        <div class="col s6 " id="rightcolumn">
            <select class="browser-default">
                <option value="" disabled selected>Choose A Route</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>

        <div class="col s6 " id="rightcolumn">
            <select class="browser-default">
                <option value="" disabled selected>Choose A Day</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
    </div>



        <table class="bordered">
            <thead>
            <tr>
                <th data-field="id">Name</th>
                <th data-field="name">Item Name</th>
                <th data-field="price">Item Price</th>
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

    </div>
</div>




@endsection