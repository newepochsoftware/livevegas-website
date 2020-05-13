<script type="application/ld+json" class="next-head">
[
  @foreach($tickets as $ticket)
    @if(isset($ticket->shows))
      {
      "@context": "https://schema.org",
      "@type": "MusicEvent",
      "name": "{{$ticket->shows->name}}",
      "startDate": "{{$ticket->ticketDate}}",
      "endDate": "{{$ticket->ticketDate}}",
      "location": {
        "@type": "Place",
        "name": "{{$ticket->shows->venues->name}}",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "{{$ticket->shows->venues->address}}",
          "addressLocality": "{{$ticket->shows->venues->city}}",
          "postalCode": "{{$ticket->shows->venues->zip}}",
          "addressRegion": "{{$ticket->shows->venues->state}}",
          "addressCountry": "US"
        }
      },
      "image": "https://www.livevegas.com{{$ticket->shows->featured_image}}",
      "description": "{{$ticket->shows->description}}",
      "offers": {
        "@type": "Offer",
        "url": "https://www.livevegas.com/shows/{{ $ticket->shows->id }}",
        "price": "{{$ticket->shows->price}}",
        "priceCurrency": "USD",
        "availability": "https://schema.org/InStock",
        "validFrom": "{{$ticket->ticketDate}}"
      },
      "performer": {
        "@type": "{{$ticket->shows->type}}",
        "name": "{{$ticket->shows->artists->name}}"
      }
      }@if (!$loop->last),@endif
    @endif
  @endforeach
]
</script>

@section('content')

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

<div class="container-fluid">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <div class="artist">
    <div class="container">


      <div class="row">

        <div class="col-md-12">
          @foreach($tickets as $ticket)
            @if(isset($ticket->shows))
            <div class="artist-show-container">
              <div class="artist-purchase-info">

                <div class="artist-thumb">
                  <img src="{{ $ticket->shows->featured_image }}">
                </diV>

                <div class="artist-main-ticket-location">
                  <div class="show-page-title">{{ $ticket->shows->artists->name }} - {{ $ticket->shows->name }}</div>
                  <div class="show-page-subtitle">{{ $ticket->shows->venues->name }}, {{ $ticket->shows->venues->city }}, {{ $ticket->shows->venues->state }}</div>
                  <div class="artist-show-location-dates">
                    {{ date('D ', strtotime($ticket->ticketDate)) }} •
                    {{ date('M j', strtotime($ticket->ticketDate)) }} •
                    {{ date('g:i A ', strtotime($ticket->ticketDate)) }}
                  </div>
                </div>

                <div class="artist-get-tickets">
                  <a href="{{ $ticket->ticket_url }}" target="_blank" class="btn btn-danger btn-lg btn-block">Show Dates</a>
                </div>
              </div>
            </div>
            @endif
          @endforeach
        </div>

      </div>

    </div>
  </div>
<div>

@include('includes.footer')
