<script type="application/ld+json" class="next-head">
[
  @foreach($shows->tickets as $ticket)
  @if($ticket->ticketDate >= $mytime)
  {
  "@context": "https://schema.org",
  "@type": "MusicEvent",
  "name": "{{$shows->name}}",
  "startDate": "{{ date('Y-m-d', strtotime($ticket->ticketDate)) }}",
  "endDate": "{{ date('Y-m-d', strtotime($ticket->ticketDate)) }}T23:00",
  "location": {
    "@type": "Place",
    "name": "{{$shows->venues->name}}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{$shows->venues->address}}",
      "addressLocality": "{{$shows->venues->city}}",
      "postalCode": "{{$shows->venues->zip}}",
      "addressRegion": "{{$shows->venues->state}}",
      "addressCountry": "US"
    }
  },
  "image": "https://www.livevegas.newepoch.com/{{$shows->featured_image}}",
  "description": "{{$shows->description}}",
  "offers":{
    "@type": "Offer",
    "url": "{{ $ticket->ticket_url }}",
    "price": "{{$shows->price}}",
    "priceCurrency": "USD",
    "availability": "https://schema.org/InStock",
    "validFrom": "{{ date('Y-m-d', strtotime($ticket->ticketDate)) }}"
  },
  "performer": {
    "@type": "{{$shows->type}}",
    "name": "{{$shows->artists->name}}"
    }
  }@if (!$loop->last),@endif
  @endif
  @endforeach
]
</script>


@section('content')

<!doctype html>
<html  ng-app="liveVegasApp" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $shows->artists->name }} - {{ $shows->name }}</title>

    <meta property="og:url" content="https://livevegas.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $shows->artists->name }} - {{ $shows->name }}">
    <meta property="og:description" content="{{ $shows->artists->bio }}">
    <meta property="og:image" content="{{ $shows->featured_image }}">

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
    <link rel="stylesheet" href="{{ asset('css/lightpick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">

    <script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
    <script src="{{ asset('js/lightpick.js') }}"></script>

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
  <!--- Hero Image -->
  <div class="hero">
    <img src="{{ $shows->hero }}" alt="">
  </div>

  <!--- Filter -->
  <div class="filter">
    <div class="show-page-title">{{ $shows->artists->name }} - {{ $shows->name }}</div>
    <div class="show-page-subtitle">{{ $shows->venue }}</div>
  </div>

  <!-- Body --->
  <div class="artist">
    <div class="container">

      <div class="artist-show-page-titles">Bio</div>

      <div class="artist-container">
          {{ $shows->artists->bio }}
      </div>

      <div class="row">

        <div class="col-md-8">
          <div class="artist-show-page-titles">{{ $shows->artists->name }}  Tickets at {{ $shows->venues->name }}</div>
          @foreach($shows->tickets->sortBy('ticketDate') as $ticket)
          @if($ticket->ticketDate >= $mytime)
          <div class="artist-show-container">
            <div class="artist-purchase-info">
              <div class="artist-dates">
                <div class="show-next-show-title">Show Date</div>
                <div class="show-next-show-month">{{ date('M ', strtotime($ticket->ticketDate)) }}</div>
                <div class="show-next-show-day">{{ date(' j', strtotime($ticket->ticketDate)) }}</div>
              </div>
              <div class="artist-ticket-location">
                <div class="show-page-title">{{ $shows->artists->name }} - {{ $shows->name }}</div>
                <div class="show-page-subtitle">{{ $shows->venues->name }}, {{ $shows->venues->city }}, {{ $shows->venues->state }}</div>
                <div class="show-location-dates" style="text-align:center;">
                   {{ date('D', strtotime($ticket->ticketDate)) }} •
                   {{ date('M j, Y', strtotime($ticket->ticketDate)) }} •
                   {{ date('g:i a', strtotime($ticket->ticketDate)) }}
                </div>
              </div>
              <div class="artist-get-tickets">
                <a href="{{ $ticket->ticket_url }}" target="_blank" class="btn btn-danger btn-lg btn-block">Buy Tickets</a>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="col-md-4">

          <div class="artist-show-page-titles">location</div>

          <div class="show-container">
            <div class="show-main-img">
              <iframe
                src="{{ $shows->venues->map_embed }}"
                width="100%"
                height="450"
                frameborder="0"
                style="border:0"
                allowfullscreen
                ></iframe>
            </div>

          </div>

          <div class="video-container">
            <div class="show-main-img">
              <iframe
                src="https://www.youtube.com/embed/{{ $shows->video }}"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                width="100%"
                height="250"
                frameborder="0"
                style="border:0"
                allowfullscreen>
              </iframe>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

  <script src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
  <script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
  <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins.js') }}"></script>

  <script src="{{ asset('js/lib/moment/moment-with-locales.min.js') }}"></script>
  <script src="{{ asset('js/lib/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
  <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
  <script src="{{ asset('js/lib/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('js/lib/prism/prism.js') }}"></script>

  <script>
    angular.module('liveVegasApp', [],
      function($interpolateProvider) {
          $interpolateProvider.startSymbol('<%');
          $interpolateProvider.endSymbol('%>');
    })
    .controller('homecontroller', function($scope, $http) {
    })
  </script>

  @include('includes.footer')
