<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{url('/css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>   
        <nav class="navbar navbar-default">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if(Route::currentRouteName()=='home') active @endif" href="{{route('home')}}">HackerOne</a>
                    </li>
                    <li class="nav-item @if(Route::currentRouteName()=='reports') active @endif">
                        <a class="nav-link" href="{{route('reports')}}">Reports</a>
                    </li>
                    <li class="nav-item @if(Route::currentRouteName()=='bounty_programs') active @endif">
                        <a class="nav-link" href="{{route('bounty_programs')}}">bounty programs</a>
                    </li>
                </ul>
            </div>
        </nav>  
        @yield('content')
    </body>
</html>