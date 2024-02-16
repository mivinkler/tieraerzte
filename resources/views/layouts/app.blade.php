<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <nav class="shadow-sm w-full fixed h-20 top-0 border-b border-gray-200 bg-sky-50">
            <div class="container h-full flex items-center justify-between">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <ul class="flex gap-4">

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <button class="flex w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 border border-indigo-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('login') }}">{{ __('Login') }}</button>
                            </li>
                        @endif

                        @if (Route::has('register'))

                                <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('register') }}">{{ __('Register') }}</button>

                        @endif
                    @else
                        <li class="flex gap-8 items-center">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="flex w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 border border-indigo-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <a class="" href="{{ route('home') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-28">
            @yield('content')
        </main>
    </div>
</body>
</html>
