<div style="margin-top: 50px">
    {{--<h6>Add bus request</h6>--}}
    <form action="addbusRequest" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row input-field">
            <div class="input-field col s4">
                <input id="bus_id" type="text" name="bus_id">
                <label for="bus_id">Number plate</label>
            </div>
            <div class="input-field col s4">
                <select name="type">
                    <option value="" disabled selected>Choose Bus type</option>
                    <option value="normal">Normal</option>
                    <option value="semiluxery">Semi Luxery</option>
                    <option value="luxery">Luxery</option>
                    <option value="highway">Highway</option>
                </select>
            </div>
        </div>
        <div class="row ">

            <div class="input-field  col s4">
                <input id="seats" type="number" min=0 name="seats">
                <label for="seats">Number of seats</label>
            </div>
            <div class="input-field  col s4">
                <input id="seatsfor_booking" type="number" min=0 name="seatsfor_booking">
                <label for="seatsfor_booking">Number of seats for booking</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s4">
                <input id="from" type="text" name="from">
                <label for="from">from</label>
            </div>
            <div class="input-field col s4">
                <input id="bus_id" type="text" name="bus_id">
                <label for="bus_id">Number plate</label>
            </div>
        </div>
        <div class="input-field col s4">
            <input id="bus_id" type="text" name="bus_id">
            <label for="bus_id">Number plate</label>
        </div>


    </form>
</div>