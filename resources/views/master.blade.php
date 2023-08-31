<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="keywords" content="Agência, blog, website, construção de sites, sistemas">
        <meta name="description" content="Task Buzzvel">
        <title>Tasks Buzzvel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/a7cf753026.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>
    <body class="antialiased">
        @yield('content')
    </body>
</html>
