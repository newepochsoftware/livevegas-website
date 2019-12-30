<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Live Vegas | Live Events, Concert Ticekts, Tour News, Venues</title>

    <meta property="og:url" content="https://livevegas.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Live Vegas | Live Events, Concert Ticekts, Tour News, Venues">
    <meta property="og:description" content="Buy concert tickets and get the latest tour news and artist insight on Live Vegas.">
    <meta property="og:image" content="https://storage.googleapis.com/livevegas-bucket/livevegas-og.jpg">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/kof2hht.css">
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/lightpick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">

    <script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-M3DP8BS');</script>
    <!-- End Google Tag Manager -->

  </head>
  <body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M3DP8BS"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!--- Navigation -->
  <header class="livevegas-nav">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="/" class="navbar-brand">
          <img src="{{ asset('images/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('/all-artists')) ? 'active' : '' }}" href="/all-artists">All Artists</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('/all-shows')) ? 'active' : '' }}" href="/all-shows">All Shows</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('/press')) ? 'active' : '' }}" href="/press">Press</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#subscribe">Subscribe</a>
            </li>
          </ul>
        </div>
        <div class="ticketmaster-logo">
          <img src="{{ asset('images/ticketmaster.png') }}" alt="Ticketmaster Live Nation">
        </div>
      </nav>
    </div>
  </header>

  @yield('content')

  @include('includes.footer')
