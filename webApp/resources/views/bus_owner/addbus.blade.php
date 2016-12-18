<div style="margin-top: 50px">
    {{--<h6>Add bus request</h6>--}}
    <form action="addbusRequest" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row input-field">
            <div class=" col s4">
                <input id="bus_id" type="text" name="bus_id">
                <label for="bus_id">Number plate</label>
            </div>
            <div class="input-field col s4">
                <select name="type">
                    <option value="" disabled selected>Choose Bus type</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
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
                <label for="seatsfor_booking">Number of seats</label>
            </div>

        </div>


    </form>
</div>