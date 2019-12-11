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
@extends('layouts.showsfrontend')

@section('content')
<div class="container-fluid">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <div class="artist">
    <div class="container" ng-controller="homecontroller">

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
                  <a href="{{ $ticket->ticket_url }}" target="_blank" class="btn btn-danger btn-lg btn-block">Buy Tickets</a>
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
@endsection
