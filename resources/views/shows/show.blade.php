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

@extends('layouts.showsfrontend')

@section('content')
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
  @endsection
