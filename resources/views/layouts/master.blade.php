<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ESAE Dashboard</title>
    <link rel="shortcut icon" href="{{asset('imagens/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
</head>
<body>
    <header>
        @include('layouts.includes.menu')
    </header>

    <main class="container-fluid">
        @include('layouts.includes.menu2')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="container-fluid">
                @if($errors->any())
                    <div class="alert alert danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="container-fluid">
                @if(session('flash_message'))
                    <div class="alert alert-success">
                        {{ session('flash_message') }}
                    </div>
                @endif
            </div>
            @yield('content')
        </div>
    </main>
    <!--
        <footer class="footer navbar-inverse navbar-fixed-bottom">
            <h5 class="text-white text-center">ISMT ©Copyright 2017 // Multimédia 2º Ano</h5>
        </footer>
    -->
</body>
</html>