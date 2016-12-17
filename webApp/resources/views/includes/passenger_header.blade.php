<div id="header">
    <nav class="nav-extended">
        <div class="nav-wrapper" style="background-color: #2e6da4">
            <a href="#" class="brand-logo" style="padding-left: 10px">Passenger</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

            {{--right top corner links--}}
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="">Profile</a></li>
                <li><a href="">Settings</a></li>
                <li><a href="">Sign out</a></li>
            </ul>

            {{----}}
            <ul class="side-nav" id="mobile-demo">

            </ul>
            {{--navbar--}}
            <ul class="tabs tabs-transparent">
                <li class="tab"><a target="_self" @yield('tab5') href="passenger_search"><i class="material-icons left">search</i>search</a></li>
                {{--<li class="tab"><a target="_self" @yield('tab1') href="passenger_new_booking"><i class="material-icons left">subtitles</i>new booking</a></li>--}}
                <li class="tab"><a target="_self" @yield('tab3') href="passenger_cancel_booking"><i class="material-icons left">clear</i>cancel booking</a></li>
                <li class="tab"><a target="_self" @yield('tab4') href="passenger_view_booking"><i class="material-icons left">call_made</i>view booking</a></li>
            </ul>
        </div>
    </nav>


</div>