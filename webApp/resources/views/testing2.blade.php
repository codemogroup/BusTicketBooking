{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--<title>The Materialize Tabs Example</title>--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">--}}
{{--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>--}}
{{--</head>--}}
{{--<body class="container">--}}
{{--<h3>Tabs Demo</h3>--}}
{{--<div class="row">--}}
{{--<div class="col s12">--}}
{{--<ul class="tabs">--}}
{{--<li class="tab col s3"><a href="#inbox">Inbox</a></li>--}}
{{--<li class="tab col s3"><a class="active" href="#unread">Unread</a></li>--}}
{{--<li class="tab col s3 disabled"><a href="#outbox">Outbox (Disabled)</a></li>--}}
{{--<li class="tab col s3"><a href="#sent">Sent</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<div id="inbox" class="col s12">Inbox</div>--}}
{{--<div id="unread" class="col s12">Unread</div>--}}
{{--<div id="outbox" class="col s12">Outbox (Disabled)</div>--}}
{{--<div id="sent" class="col s12">Sent</div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

@extends('layout.masterbasics')

@section('body')

    <div class="input-field col s4">
        <select>
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
        </select>
    </div>
@endsection