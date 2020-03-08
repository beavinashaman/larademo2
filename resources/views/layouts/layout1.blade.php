<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div class="container">
@hasSection('navigation')
<div class="pull-right">
@yield('navigation')
</div>
<div class="clearfix">
</div>
@endif

<h2>@yield('title')</h2>

@if(Session::has('message'))
<p>{{Session::get('message')}}</p>
@endif


@yield('content')

</div> 

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>