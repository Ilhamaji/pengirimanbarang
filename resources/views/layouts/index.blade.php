<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    @include('components.nav')
    <div class="px-15 pl-64 w-100 px-10 overflow-y-scroll">
        @yield('content')
    </div>
</html>