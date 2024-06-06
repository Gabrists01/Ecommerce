<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Ecommerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield("scriptjs")
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
    <a href="#" class="navbar-brand">TechStore</a>
    <div class="collapse navbar-collapse">
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('home') }}">HOME</a>
            <a class="nav-link" href="{{ route('categoria') }}">Categorias</a>
            <a class="nav-link" href="{{ route('cadastrar') }}">Cadastrar</a>
            @if(!\Auth::user())
                <a class="nav-link" href="{{ route('logar') }}">Logar</a>
            @else
                <a class="nav-link" href="{{ route('compra_historico') }}">Minhas Compras</a>
                <a class="nav-link" href="{{ route('sair') }}">Logout</a>
            @endif
        </div>
    </div>
    <a href="{{ route('ver_carrinho') }}" class="btn-sm"><i class="fa fa-shopping-cart"></i></a>
</nav>

<div class="container">
    <div class="row">
        @if(\Auth::user())
            <div class="col-12">
                <p class="text-right">Seja bem-vindo, {{ \Auth::user()->nome }}, <a href="{{ route('sair') }}">Sair</a></p>
            </div>
        @endif

        @if($message = Session::get("err"))
            <div class="col-12">
                <div class="alert alert-danger">{{ $message }}</div>
            </div>
        @endif

        @if($message = Session::get("ok"))
            <div class="col-12">
                <div class="alert alert-success">{{ $message }}</div>
            </div>
        @endif
        
        @yield("conteudo")
    </div>
</div>

</body>
</html>
