<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        window.App = {!! json_encode([
            'user' => Auth::user(),
            ]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <svg width="220px" height="22px" viewBox="0 0 422 41" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" fill="#3088D2">
                                        <text id="Cashflow-Assistant" font-family="HelveticaNeue-Medium, Helvetica Neue" font-size="40" font-weight="400">
                                            <tspan x="68" y="35">Cashflow Assistant</tspan>
                                        </text>
                                        <g id="Wave-Flow-Icon" transform="translate(0.000000, 2.000000)">
                                            <path d="M0.59,35.957 C0.59,35.957 4.5822,30.8086 17.457,17.934 C30.3318,5.0594 28.785,0.875 43.465,0.875 C58.145,0.875 62.258,16.902 62.258,16.902 C62.258,16.902 43.465,3.511 41.145,12.7809 C38.02,25.2729 53.633,35.9609 70.5,35.4409" id="Fill-1"></path>
                                            <path d="M45.5777375,23.0932 C45.1246152,21.3041 45.6128976,12.6242 58.1988,18.9174 C56.7104926,16.5229 42.6327229,7.1364 42.9447244,15.8119 C42.9449244,15.812 42.3238313,19.687 45.5777375,23.0932 Z" id="Fill-2"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                            <li><a href="{{ route('login') }}">Login <i class="fa fa-sign-in"></i></a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <span id="name">{{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout <i class="fa fa-sign-out"></i>
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        @yield('content')
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
