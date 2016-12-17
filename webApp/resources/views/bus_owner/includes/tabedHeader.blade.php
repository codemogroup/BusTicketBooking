<div id="header">
    <nav class="nav-extended">
        <div class="nav-wrapper" style="background-color: #2e6da4">
            <a href="#" class="brand-logo" style="padding-left: 10px"> Operator</a>
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
                <li class="tab"><a target="_self" @yield('tab1') href="{{url('ownerhome')}}"><i class="material-icons left">home</i>home</a></li>
                <li class="tab"><a target="_self" @yield('tab2') href="{{url('bankAccount')}}"><i class="material-icons left">account_balance</i>Bank account</a></li>
                <li class="tab"><a target="_self" @yield('tab3') href="{{url('addbus')}}"><i class="material-icons left">directions_bus</i>add bus</a></li>
                <li class="tab"><a target="_self" @yield('tab4') href="{{url('editbus')}}"><i class="material-icons left">directions_bus</i>Edit bus</a></li>
                {{--<li class="tab"><a target="_self" @yield('tab4') href=""><i class="material-icons left">call_made</i>other</a></li>--}}
            </ul>
        </div>
    </nav>


</div>