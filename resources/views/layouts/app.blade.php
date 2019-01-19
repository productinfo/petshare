<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Petshare.com') }} - more happiness in your and an animal's life!</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        option {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Petshare.com') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('users.index') }}">{{ __('Index Users') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="/users/show/{{ auth()->user()->id }}">{{ __('Show User') }}</a>--}}
                            {{--<a class="nav-link" href="{{ route('users.show') }}">{{ __('Show User') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('users.edit') }}">{{ __('Edit User') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('users.destroy') }}">{{ __('Delete/destroy User') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('pets.index') }}">{{ __('Index Pets') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('pets.create') }}">{{ __('Create Pet Profile') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('pets.show') }}">{{ __('Show Pets') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('pets.edit') }}">{{ __('Edit Pet') }}</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('pets.destroy') }}">{{ __('Delete/destroy Pet') }}</a>--}}
                        {{--</li>--}}

                        <li class="nav-item mr-4">
                            <a class="nav-link" href="{{ route('pets.search') }}">{{ __('SEARCH PETS') }}</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->screen_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">

            @yield('content')

                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
