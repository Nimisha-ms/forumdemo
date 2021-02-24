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

     <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

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
        @include('layouts.nav')
       
        <main class="py-4">
            @yield('content')

            <flash message="{{ session('flash')}}"></flash>
            <!-- <example-component></example-component> -->
        </main>
    </div>
</body>
</html>
