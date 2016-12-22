<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>@yield('title')</title>

    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>


    {{--<script--}}
            {{--src="https://code.jquery.com/jquery-3.1.1.min.js"--}}
            {{--integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="--}}
            {{--crossorigin="anonymous"></script>--}}


    <!-- Compiled and minified JavaScript -->
    <link rel="stylesheet" href="src/main.css">
</head>

<body>
<div id="wrapper">

        @include('includes.NTC.ntcheader')



{{--    @include('includes.footer')--}}
    <div class="row" >
        <div class="col s3 " id="leftcolumn" >
{{--            @include('includes.NTC.ntcNotificationBar')--}}
        </div>
        <div class="col s9 " id="rightcolumn">
            <div>
                @yield('content')
            </div><!-- #content -->
        </div>
    </div>
   @include('includes.footer')


</div><!-- #wrapper -->



</body>

</html>