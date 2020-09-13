<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Vue-App</title>

</head>
<body>


<div id="app" class="container">
    @yield('content')
</div>


<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
