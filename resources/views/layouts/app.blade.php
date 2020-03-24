



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
  <title>FamilyShare</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> 
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

  <!-- Libraries CSS Files -->
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/style.css" rel="stylesheet">
   

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm @yield('nav') ">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div><img src="/img/logo.png" style="height: 60px; border-right: 1px solid #333;" class="pr-3"></div>
                    <a class="pl-2" href="/">FamilyShare</a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav pl-4 ">
                        @guest    
                          
                            <h5><a style="color:black" class="nav-link pl-2 pt-2" href="/#features">Features</a></h5>
                            <h5><a style="color:black" class="nav-link pl-2 pt-2" href="/#pricing">Preise</a></h5>
                            <h5><a style="color:black" class="nav-link pl-2 pt-2" href="/#team">Team</a></h5>
                            <h5><a style="color:black"class="nav-link pl-2 pt-2" href="/#contact">Kontakt</a></h5>
    
                        @else   
                            <h5><a style="color:black" class="nav-link pl-2 pt-2" href="{{ url('/posts') }}">Videos</a></h5>
                            <h5><a style="color:black" class="nav-link pl-2 pt-2" href="{{ url('/simple') }}">SimpleMode</a></h5>
                            <h5><a style="color:black" class="nav-link pl-2 pt-2" href="{{ url('/dashboard') }}">Dashboard</a></h5>
                            
                        @endguest 
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <h5><a style="color:black" class="nav-link pl-3 pt-2" href="{{ route('login') }}">{{ __('Einloggen') }}</a></h5>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <h5><a style="color:black" class="nav-link pl-3 pt-2" href="{{ route('register') }}">{{ __('Registrieren') }}</a></h5>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color:black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main class="py-0">
        @yield('content')
    </main>
      
  <!-- JavaScript Libraries -->
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/superfish/hoverIntent.js"></script>
  <script src="/lib/superfish/superfish.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/modal-video/js/modal-video.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  

  <!-- Template Main Javascript File -->
  <script src="/js/main.js"></script>
  
</body>
</html>
