






<ul id="dropdown1" class="dropdown-content">

    <li><a href="searchbus">Search Buses</a></li>

</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="{{action('ntcController@allRoutes')}}">See All</a></li>
    <li class="divider"></li>
    <li><a href="{{action('ntcController@addNewRoute')}}">Add New</a></li>
    <li class="divider"></li>
    <li><a href="changeroute">Change</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
    <li><a href="{{action('ntcController@allOperators')}}">See All</a></li>
    <li class="divider"></li>
    <li><a href="{{action('ntcController@addNewOperator')}}">Add New</a></li>
    <li class="divider"></li>
    <li><a href="/changeoperator">Change</a></li>
</ul>

<ul id="dropdown4" class="dropdown-content">
    <li><a href="{{action('ntcController@allStations')}}">See All</a></li>
    <li class="divider"></li>
    <li><a href="addnewstation">Add New</a></li>

</ul>

<nav>
    <div class="nav-wrapper" style="background-color: #2e6da4">
        <a href="ntc" class="brand-logo" style=" padding-left:20px">Admin </a>

        <ul class="right hide-on-med-and-down" style="padding-right:200px ">
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" style="padding-right:30px" data-hover="true" data-beloworigin="true" href="#!" data-activates="dropdown1">Buses<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" data-hover="true"  data-beloworigin="true" href="#!" data-activates="dropdown2">Routes<i class="material-icons right">arrow_drop_down</i></a></li>

            <li><a class="dropdown-button" data-hover="true"  data-beloworigin="true" href="#!" data-activates="dropdown3">Operators<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" data-hover="true"  data-beloworigin="true" href="#!" data-activates="dropdown4">Stations<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>