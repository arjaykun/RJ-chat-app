<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <h5 class="mr-auto">
            <a href="/home">
                {{ config('app.name', 'Laravel') }}      
            </a>
          </h5>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto align-items-center">
            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" width="30" height="30" class="rounded-circle">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ auth()->user()->name }}
                </span>
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                  <button class="btn btn-link btn-sm text-dark">Logout</button>
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
    <!-- Scripts -->   
    <script>
      window.host= '{{ config('app.url', 'http://laravel-chat.com') }}';
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/5f55851da7.js" crossorigin="anonymous"></script>
</body>
</html>
