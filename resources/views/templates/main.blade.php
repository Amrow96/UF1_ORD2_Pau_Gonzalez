<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>


    <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css')}}">
    <script src="{{ asset("js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{ asset("js/popper.min.js")}}"></script>
    <script src="{{ asset("js/bootstrap.min.js")}}"></script>



</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark navbar-fixed-top">
        <a class="navbar-brand text-primary" href="{{url('/')}}">Cursos</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
            <a class="nav-link text-primary" href="{{url('/cursos')}}">Cursos</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link text-primary" href="{{url('/usuaris')}}">Usuarios</a>
            </li>
        </ul>
    </nav>
</body>

<div class="container">
    @yield('principal')
</div>

</html>
