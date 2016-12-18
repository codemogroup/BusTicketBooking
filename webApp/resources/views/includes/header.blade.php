

{{--<<<<<<< HEAD--}}
{{--=======--}}
    {{--<div id="header">--}}
        {{--<nav class="nav-extended">--}}
            {{--<div class="nav-wrapper" style="background-color: #2e6da4">--}}
                {{--<a href="#" class="brand-logo">@yield('logo')</a>--}}
                {{--<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>--}}
                {{--<ul id="nav-mobile" class="right hide-on-med-and-down">--}}
                    {{--<li><a href="sass.html">Sass</a></li>--}}
                    {{--<li><a href="badges.html">Components</a></li>--}}
                    {{--<li><a href="collapsible.html">JavaScript</a></li>--}}
                {{--</ul>--}}
                {{--<ul class="side-nav" id="mobile-demo">--}}
                    {{--<li><a href="sass.html">Sass</a></li>--}}
                    {{--<li><a href="badges.html">Components</a></li>--}}
                    {{--<li><a href="collapsible.html">JavaScript</a></li>--}}
                {{--</ul>--}}

                {{--<ul class="tabs tabs-transparent">--}}
                    {{--<li class="tab"><a class="active" href="#test1">@yield('Tab1')</a></li>--}}
                    {{--<li class="tab"><a class="active" href="#test2">@yield('Tab2')</a></li>--}}
                    {{--<li class="tab"><a class="active" href="#test2">@yield('Tab3')</a></li>--}}
                    {{--<li class="tab"><a class="active" href="#test4">@yield('Tab4')</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</nav>--}}
{{-->>>>>>> a71ce77a49fb619ca222541180d40e9cc9eb14cd--}}

    <div id="header">
        <nav>
        <div class="nav-wrapper z-depth-5" style="background-color: #2e6da4; height: 100px;">
            <a href="#" class="brand-logo" style="margin-left: 3%">@yield('logo')</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>@yield('headerlink1')</li>
                <li>@yield('headerlink2')</li>
                <li>@yield('headerlink3')</li>

            </ul>
        </div>
    </nav>
    </div><!-- #header -->