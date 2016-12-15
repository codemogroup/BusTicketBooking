

    <div id="header">
        <nav class="nav-extended">
            <div class="nav-wrapper" style="background-color: #2e6da4">
                <a href="#" class="brand-logo">@yield('logo')</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>

                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="#test1">@yield('Tab1')</a></li>
                    <li class="tab"><a class="active" href="#test2">@yield('Tab2')</a></li>
                    <li class="tab"><a class="active" href="#test2">@yield('Tab3')</a></li>
                    <li class="tab"><a class="active" href="#test4">@yield('Tab4')</a></li>
                </ul>
            </div>
        </nav>


    </div><!-- #header -->