<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <script src="https://use.fontawesome.com/e881a3351a.js"></script> -->
    <link href="http://glamour.dev/css/bootstrap.min.css" rel="stylesheet" media="all">

</head>
<body>
    <div id="app">
        
        @yield('content')
    </div>
</body>
</html>
