<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Board Laravel 11</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="mx-auto mt-10 max-w-2xl text-slate-700
    bg-gradient-to-r from-indigo-200 via-purple-100 to-green-200">
        {{ $slot }}
    </body>
</html>
