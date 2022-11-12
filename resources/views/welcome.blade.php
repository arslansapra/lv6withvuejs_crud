<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
            <div id="app">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">Lv6 & VueJs</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
    <router-link to="/" class="nav-link">Home</router-link>
    </li>
    <li class="nav-item">
    <router-link to="/example" class="nav-link">Example Page</router-link>
    </li>
    <li class="nav-item">
    <router-link to="/sample" class="nav-link">Sample Page</router-link>
    </li>
  </ul>
</nav>
    
    <router-view></router-view>
                
</div>


        <script type="text/javascript" src="{{ asset(mix('js/app.js')) }}" defer></script>
    </body>
</html>
