<div id="header">
    <nav class="nav-extended">
        <div class="nav-wrapper" style="background-color: #2e6da4">
            <a href="#" class="brand-logo" style="padding-left: 10px"> Bus owner</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

            {{--right top corner links--}}
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="">  {{$name}} <h3 class="material-icons left">person_pin</h3></a></li>
                <li><a href="">Settings <h3 class="material-icons left">settings_applications</h3></a></li>
                <li><a href="signout">Sign out <h3 class="material-icons left">power_settings_new</h3></a></li>

            </ul>

            {{----}}
            <ul class="side-nav" id="mobile-demo">

            </ul>
            {{--navbar--}}
            <ul class="tabs tabs-transparent">
                {{--<li class="tab"><a target="_self" @yield('tab1')  href="#home"><i class="material-icons left">home</i>home</a></li>--}}
                <li class="tab"><a target="_self" @yield('tab1')  href="ownerbank"><i class="material-icons left">account_balance</i>Bank account</a></li>
                <li class="tab"><a target="_self" @yield('tab2') href="owneraddbus"><i class="material-icons left">directions_bus</i>Add bus request</a></li>
                {{--<li class="tab"><a  target="_self" @yield('tab3') href="ownereditbus"><i class="material-icons left">directions_bus</i>Edit bus</a></li>--}}
                {{--<li class="tab"><a target="_self" @yield('tab4') href=""><i class="material-icons left">call_made</i>other</a></li>--}}
            </ul>
        </div>
    </nav>


</div>