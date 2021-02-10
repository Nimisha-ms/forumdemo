<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body { padding-bottom: 100px; }
        .level { display:flex; align-items: center;}
        .flex { flex:1; }

        .panel {
  padding: 15px;
  margin-bottom: 20px;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}

.panel-heading {
  padding: 10px 15px;
  margin: -15px -15px 15px;
  font-size: 17.5px;
  font-weight: 500;      
  background-color: #f5f5f5;
  border-bottom: 1px solid #dddddd;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}

.panel-footer {
  padding: 10px 15px;
  margin: 15px -15px -15px;
  background-color: #f5f5f5;
  border-top: 1px solid #dddddd;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
} 

.panel-primary {
  border-color: #428bca;
}

.panel-primary .panel-heading {
  color: #ffffff;
  background-color: #428bca;
  border-color: #428bca;
}

.panel.noborder {
    border: none;
    box-shadow: none;
}
.panel.noborder > .panel-heading {
    border: 1px solid #dddddd;
    border-radius: 0;
}

/* This kinda of works but now 
.panel, .panel-group .panel-heading+.panel-collapse>.panel-body{
    border: none;
}
*/
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        


                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle navbar-brand" data-toggle="dropdown">Browse</a>
                            <div class="dropdown-menu">                                                              
                               <a class="dropdown-item" href="/threads">All Threads</a>

                             <a class="dropdown-item" href="/threads?popular=1">Popular Threads</a>

                               @if(auth()->check())
                               <a class="dropdown-item" href="/threads?by={{ auth()->user()->name }}">My Threads</a>
                               @endif
                              
                                <!-- <div class="dropdown-divider"></div>
                                <a href="#"class="dropdown-item">Trash</a> -->
                            </div>
                        </li>                       

                        <li><a href="/threads/create" class="navbar-brand" href="/threads">New Thread</a></li>   

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Channels</a>
                            <div class="dropdown-menu">
                                
                              @foreach($channels as $channel)                                
                               <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
                               @endforeach
                                <!-- <div class="dropdown-divider"></div>
                                <a href="#"class="dropdown-item">Trash</a> -->
                            </div>
                        </li>  

                           
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
