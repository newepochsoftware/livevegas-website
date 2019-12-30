<!doctype html>
<html  ng-app="liveVegasApp" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/kof2hht.css">
    <link rel="stylesheet" href="{{ asset('css/lib/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/prism/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/lightpick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">

    <script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
    <script src="{{ asset('js/lightpick.js') }}"></script>
  </head>
  <body>
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
