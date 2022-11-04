<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/front/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
              <img src="/img/logo.png" alt="DC Sistema de Vendas">
            </a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
              </li>
              @auth
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">Painel Admin</a>
              </li>
              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" 
                    class="nav-link" 
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sair
                  </a>
                </form>
              </li>
              @endauth
              @guest
              <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="/register" class="nav-link">Cadastre-se</a>
              </li>
            
              @endguest
            </ul>
          </div>
        </nav>
      </header>
      <main>
        <div class="container-fluid">
          <div class="row">
            @if(session('msg'))
              <p class="msg">{{ session('msg') }}</p>
            @endif
            @if(session('not_msg'))
              <p class="not-msg" style="backgroud-color: red !important;">{{ session('not_msg') }}</p>
            @endif
            @yield('content')
          </div>
        </div>
      </main>
      <footer>
        <p>DC Sistema de Vendas &copy; 2022</p>
      </footer>
      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>