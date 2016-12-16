<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>@yield('title')</title>

    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <link rel="stylesheet" href="src/main.css">
</head>

<body>
<div id="wrapper">

        @include('includes.ntcheader')


    <div class="row" >
        <div class="col s3 " id="leftcolumn" >
            @include('includes.ntcNotificationBar')
        </div>
        <div class="col s9 " id="rightcolumn">
            <div>
                @yield('content')
            </div><!-- #content -->
        </div>
    </div>
   {{--@include('includes.footer')--}}

</div><!-- #wrapper -->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>

</html>