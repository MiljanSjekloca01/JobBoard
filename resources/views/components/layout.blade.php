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
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{route("jobs.index")}}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li> {{ auth()->user()->name ?? "Anynomus" }} </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </li>
                @else
                <a href="{{ route("auth.create")}}">Sign in</a>
            @endauth
        </ul>
    </nav>

    @if (session("success"))
        <div role="alert" 
            class="my-8 rounded-md border-l-8 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Succes!</p>
            <p>{{ session("success") }}</p>
        </div>
    @endif

        {{ $slot }}
    </body>
</html>
