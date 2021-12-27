<!DOCTYPE html>
<html>
<head>
    <title>LSM - PT. Limputra Sukses Motorindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
        body{
            margin: 0;
            font-size: 20px;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        table, th, td {
            border: 1px solid black;
            width: 1100px;
        }
        th {
            width: 300px;
            padding-left: 10px;
        }
        td {
            width: 800px;
            padding-left: 10px;
            padding-right: 10px;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/">LSM</a>
   
        <div class="navbar navbar-light" id="navbarSupportedContent">
                @guest
                        <a class="nav-link text-secondary" href="{{ route('login') }}">Login</a>
                @elseif (Auth::user()->roles === 1)
                        <a href="" class="nav-link text-secondary">Hi, {{ Auth::user()->name }}</a>
                        <a class="nav-link text-secondary" href="{{ route('admin') }}">Admin</a>
                        <a class="nav-link text-secondary" href="{{ route('logout') }}">Logout</a>
                @else
                        <p class="nav-link text-secondary">Hi, {{ Auth::user()->name }}</p>
                        <a class="nav-link text-secondary" href="{{ route('logout') }}">Logout</a>
                @endguest
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  
@yield('content')
     
</body>
</html>