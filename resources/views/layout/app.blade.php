<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.lite.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/svg-with-js.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/v4-shims.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('uikit/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('uikit/css/uikit-rtl.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('assets/logos/1.ico') }}" type="image/x-icon">
    <title>all-how.com</title>
    <style>
        .allhowpdf-color {
            background-color: #fe6baf;
        }

        .btn-allhow {
          background-color: #fdc72f;
        }

        body {
            font-family: ubuntu;
            background-color: #f8fafc;
        }

        @font-face {
            font-family: ubuntu;
            src: url("{{ URL::asset('fonts/Ubuntu-Light.ttf') }}");
        }
    </style>
    @yield('style')
</head>
<body>    
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark allhowpdf-color">
    
      <!-- Navbar brand -->
      <a href="{{ route('visitors.home') }}" class="navbar-brand">
        <img class="rounded-circle" src="{{ URL::asset('assets/logos/2.jpg') }}" height="50px;" width="50px;">
      </a>
      
      <span class="navbar-text white-text text-center d-block d-lg-none">
        All-how.com
      </span>
      
      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">
    
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('visitors.home') }}">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        
        <span class="navbar-text white-text my-0 py-0 d-none d-lg-block">All-how.com</span>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('visitors.about') }}">A Propos</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('visitors.contact') }}" class="nav-link">Contact</a>
          </li>
        </ul>

      </div>
      <!-- Collapsible content -->  
    </nav>
    <div class="d-none d-lg-block">
        <div class="d-flex">
            @isset($frenchzone)
              <a href="{{ route('visitors.english.home') }}" class="mr-auto btn btn-lg btn-allhow white-text">ENGLISH</a>
            @endisset
            
            @isset($englishzone)
              <a href="{{ route('visitors.home') }}" class="mr-auto btn btn-lg btn-allhow white-text">French</a>
            @endisset
        </div>
    </div>
    <div class="d-block d-lg-none">
        <div class="d-flex">
            @isset($frenchzone)
              <a href="{{ route('visitors.english.home') }}" class="mr-auto btn btn-sm btn-allhow white-text">ENGLISH</a>
            @endisset

            @isset($englishzone)
              <a href="{{ route('visitors.home') }}" class="mr-auto btn btn-sm btn-alhow white-text">French</a>
            @endisset
        </div>
    </div>
    
    <!--/.Navbar-->

    @yield('content')



    <script src="{{ URL::asset('mdb/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/mdb.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/popper.js') }}"></script>
    <script src="{{ URL::asset('uikit/js/uikit.js') }}"></script>
    <script src="{{ URL::asset('uikit/js/uikit-icons.js') }}"></script>
    
    @yield('script')
</body>
</html>