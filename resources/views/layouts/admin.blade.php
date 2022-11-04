<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- CSS da aplicação -->
        <link href="/css/admin/styles.css" rel="stylesheet">
    </head>
    <body>
        
        @guest <!--- quando não estiver autenticado --> 

        @endguest

        @auth <!-- logado -->
            <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar">
                    <div class="sidebar-header">                   
                        <figure class="figure">
                            <img src="/img/logo.png" class="figure-img img-fluid rounded" style="width: 200px">
                        </figure>
                    </div>

                    <ul class="list-unstyled components">
                        <p>Olá, {{ auth()->user()->name }}</p>
            
                        <li>
                            <a href="/dashboard">Produtos</a>
                        </li>
                        <li class="components">
                            <a href="/vendas">Vendas</a>
                        </li>
                    </ul>  
                    <ul class="components">
                        <li class="nav-item">
                            <a href="/"><< Voltar para o site</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled components">
                        <li class="nav-item" style="color: #000;">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" 
                                class="nav-link" 
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                SAIR
                                </a>
                            </form>
                        </li>
                    </ul>
                    
                            
                </nav>

                <!-- Conteúdo -->
                <div id="content">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        @endauth
    </body>
</html>

<script src="/js/scripts.js"></script>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>