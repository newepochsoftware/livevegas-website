<script type="application/ld+json" class="next-head">
[
  @foreach($shows as $show)
  {
  "@context": "https://schema.org",
  "@type": "MusicEvent",
  "name": "{{$show->name}}",
  "startDate": "{{$show->startDate}}",
  "endDate": "2025-01-01T23:00",
  "location": {
    "@type": "Place",
    "name": "{{$show->venues->name}}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{$show->venues->address}}",
      "addressLocality": "{{$show->venues->city}}",
      "postalCode": "{{$show->venues->zip}}",
      "addressRegion": "{{$show->venues->state}}",
      "addressCountry": "US"
    }
  },
  "image": "https://www.livevegas.com{{$show->featured_image}}",
  "description": "{{$show->description}}",
  "offers": {
    "@type": "Offer",
    "url": "https://www.livevegas.com/shows/{{ $show->slug }}",
    "price": "{{$show->price}}",
    "priceCurrency": "USD",
    "availability": "https://schema.org/InStock",
    "validFrom": "2024-10-20T16:00"
  },
  "performer": {
    "@type": "{{$show->type}}",
    "name": "{{$show->artists->name}}"
  }
}@if (!$loop->last),@endif
  @endforeach

]
</script>
<!doctype html>
<html  ng-app="liveVegasApp" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

@section('content')

<!--- Hero Image -->
  <div class="hero">
    <div id="liveVegasCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach($hero as $heroes)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <a href="{{ $heroes->link }}">
            <img src="{{$heroes->image}}" alt="{{$heroes->alt}}" border="0">
          </a>
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#liveVegasCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#liveVegasCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div ng-controller="homecontroller">
    <!--- Filter -->
    <div class="filter">
      <div class="row">

        @csrf
        <div class="col-md-2">
          <div class="filter-txt">View by</div>
        </div>

        <div class="col-md-4 select-area">
          <div class='input-group date'>
            <input autocomplete="off" ng-model="datepicker" name="filterFromDate" id="datepicker" type="text" class="form-control" placeholder="Dates...">
          </div>
        </div>

        <!-- <input ng-model="filterDatefrom" name="filterFromDatetxt" id="filterFromDatetxt" type="hidden">
        <input ng-model="filterDateto" name="filterToDatetxt" id="filterToDatetxt" type="hidden"> -->

        <div class="col-md-4 select-area">
          <select class="custom-select d-block w-100" id="artists" name="artists">
            <option value="all">All Artists...</option>
            <option ng-repeat="lvArtist in lvArtists | orderBy:'artist_name' | unique: 'artist_name'" value="<% lvArtist.artist_name %>"><% lvArtist.artist_name %></option>
          </select>
        </div>

        <div class="col">
          <button ng-click="resetFilter()" class="btn btn-danger btn-block" type="submit">
            Reset All Filters
          </button>
        </div>

      </div>
    </div>

    <!-- Body --->
    <div class="shows">
      <div class="container">

        <div class="row">
          <div class="no-dates" ng-show="!lvShows.length">Please Select Another Date Or Artist.</div>

          <div ng-model="artist" class="col-md-4 col-sm-6" ng-repeat="lvShow in lvShows | orderBy:'latest.ticketDate'">

            <div class="show-container">
              <div class="show-main-img">
                <a href="/shows/<% lvShow.slug %>">
                  <img src="<%lvShow.featured_image%>" alt="<% lvShow.artist_name %>">
                </a>
              </div>
              <a href="/shows/<% lvShow.slug %>">
                <div class="shows-cart-button"><i class="fas fa-ticket-alt"></i></div>
              </a>
              <div class="show-info">
                <div class="show-dates">
                  <div class="show-next-show-title">Show Date</div>
                  <div class="show-next-show-month"><% lvShow.latest_tickets_month %></div>
                  <div class="show-next-show-day"><% lvShow.latest_tickets_day %></div>
                </div>
                <div class="show-location">
                  <div class="show-location-title">
                    <a href="/shows/<% lvShow.slug %>"><% lvShow.artist_name %> - <% lvShow.show_name %></a>
                  </div>
                  <div class="show-location-dates">
                     <% lvShow.latest_tickets_week_day %> •
                     <% lvShow.latest_tickets_date %> •
                     <% lvShow.latest_tickets_time %>
                  </div>
                  <div class="show-location-place">
                    <% lvShow.venue_name %> ,
                    <% lvShow.venue_city %> ,
                    <% lvShow.venue_state %>
                  </div>
                </div>
              </div>
              <a href="/shows/<% lvShow.slug %>" class="btn btn-danger btn-block">
                View All Shows
              </a>
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
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
  // here we define our unique filter
  .filter("unique", function() {
    // we will return a function which will take in a collection
    // and a keyname
    return function(collection, keyname) {
      // we define our output and keys array;
      var output = [], keys = [];

      // we utilize angular's foreach function
      // this takes in our original collection and an iterator function
      angular.forEach(collection, function(item) {
        // we check to see whether our object exists
        var key = item[keyname];
        // if it's not already part of our keys array
        if (keys.indexOf(key) === -1) {
          // add it to our keys array
          keys.push(key);
          // push this item to our final output array
          output.push(item);
        }
      });
      // return our array which should be devoid of
      // any duplicates
      return output;
    };
  })
  .controller('homecontroller', function($scope, $http, $rootScope) {

      "use strict";
      $scope.errorMessage = "";

      $("#artists").each(function() { this.selectedIndex = 0 });

      $http.get("api/shows").then(function(res) {

        var events = [];
        var ticketDates = [];
        var eventInfo = res.data;

        $scope.artistFitered = false;
        $scope.datesFitered = false;

        function loadEvents() {
          angular.forEach(eventInfo, function(value, key) {
              events.push({
                show_name: value.name,
                slug: value.slug,
                artist_name: value.artists.name,
                venue_name: value.venues.name,
                venue_city: value.venues.city,
                venue_state: value.venues.state,
                featured_image: value.featured_image,
                latest: value.latest_tickets,
                tickets: value.tickets,
                latest_tickets_month: moment(value.latest_tickets.ticketDate).format("MMM"),
                latest_tickets_day: moment(value.latest_tickets.ticketDate).format("D"),
                latest_tickets_date: moment(value.latest_tickets.ticketDate).format("MMM D, YYYY"),
                latest_tickets_week_day: moment(value.latest_tickets.ticketDate).format("ddd"),
                latest_tickets_time: moment(value.latest_tickets.ticketDate).format("LT")
              });
          });
          $scope.lvShows = events;
          $scope.lvArtists = events;
          $scope.artist = {};
        }

        loadEvents();

        var picker = new Lightpick({
          field: document.getElementById('datepicker'),
          singleDate: false,
          selectForward: true,
          onSelect: function(start, end){
              var searchStartDate = start.format('YYYY-MM-DD');
              var searchEndDate = end.format('YYYY-MM-DD');

              var convertedStart = start.format('MMM Do, YYYY');
              var convertedEnd = end.format('MMM Do, YYYY');

              $scope.datepicker = convertedStart + ' - ' + convertedEnd;

              $scope.filterDatefrom = searchStartDate;
              $scope.filterDateto = searchEndDate;
              $scope.datesFitered = true;
              $scope.errorMessage = "";

              var artistResult = [];

              if ($scope.artistFitered == true){
                  @foreach($tickets as $ticket)
                    @if(isset($ticket->shows))
                    if ('{{$ticket->shows->artists->name}}'== $scope.artistOptions && moment('{{$ticket->ticketDate}}').format("YYYY-MM-DD") >= $scope.filterDatefrom  && $scope.filterDateto >= moment('{{$ticket->ticketDate}}').format("YYYY-MM-DD"))  {
                          artistResult.push({
                            show_name: '{{$ticket->shows->name}}',
                            artist_name: '{{ $ticket->shows->artists->name }}',
                            venue_name: '{{ $ticket->shows->venues->name }}',
                            venue_city: '{{ $ticket->shows->venues->city }}',
                            venue_state: '{{ $ticket->shows->venues->state }}',
                            featured_image: '{{ $ticket->shows->featured_image }}',
                            latest_tickets_month: moment('{{$ticket->ticketDate}}').format("MMM"),
                            latest_tickets_day: moment('{{$ticket->ticketDate}}').format("D"),
                            latest_tickets_date: moment('{{$ticket->ticketDate}}').format("MMM D"),
                            latest_tickets_week_day: moment('{{$ticket->ticketDate}}').format("ddd"),
                            latest_tickets_time: moment('{{$ticket->ticketDate}}').format("LT"),
                            slug: '{{$ticket->shows->slug}}'
                          });
                       }
                    @endif
                  @endforeach
              } else if($scope.datesFitered == true){
                @foreach($tickets as $ticket)
                  @if(isset($ticket->shows))
                   if (moment('{{$ticket->ticketDate}}').format("YYYY-MM-DD") >= searchStartDate && searchEndDate >= moment('{{$ticket->ticketDate}}').format("YYYY-MM-DD"))  {
                        artistResult.push({
                          show_name: '{{$ticket->shows->name}}',
                          artist_name: '{{ $ticket->shows->artists->name }}',
                          venue_name: '{{ $ticket->shows->venues->name }}',
                          venue_city: '{{ $ticket->shows->venues->city }}',
                          venue_state: '{{ $ticket->shows->venues->state }}',
                          featured_image: '{{ $ticket->shows->featured_image }}',
                          latest_tickets_month: moment('{{$ticket->ticketDate}}').format("MMM"),
                          latest_tickets_day: moment('{{$ticket->ticketDate}}').format("D"),
                          latest_tickets_date: moment('{{$ticket->ticketDate}}').format("MMM D"),
                          latest_tickets_week_day: moment('{{$ticket->ticketDate}}').format("ddd"),
                          latest_tickets_time: moment('{{$ticket->ticketDate}}').format("LT"),
                          slug: '{{$ticket->shows->slug}}'
                        });
                     }
                  @endif
                @endforeach
              }
              $scope.$apply( $scope.lvShows = artistResult);
          }
        });

        $('input[name="filterFromDate"]').val('');
        $('input[name="filterFromDate"]').attr("placeholder",'Dates...');

        $rootScope.resetFilter = function() {
          $('#filterFromDate').val('');
          $scope.artistFitered = false;
          $scope.datesFitered = false;
          $scope.errorMessage = "";
          $scope.filterDatefrom = "";
          $scope.filterDateto = "";
          $scope.datepicker = "Dates...";

          var result = [];
          var ticketDates = [];
          var eventInfo = res.data;
          $("#artists").each(function() { this.selectedIndex = 0 });

          angular.forEach(eventInfo, function(value, key) {
              result.push({
                show_name: value.name,
                slug: value.slug,
                artist_name: value.artists.name,
                venue_name: value.venues.name,
                venue_city: value.venues.city,
                venue_state: value.venues.state,
                featured_image: value.featured_image,
                latest: value.latest_tickets,
                tickets: value.tickets,
                latest_tickets_month: moment(value.latest_tickets.ticketDate).format("MMM"),
                latest_tickets_day: moment(value.latest_tickets.ticketDate).format("D"),
                latest_tickets_date: moment(value.latest_tickets.ticketDate).format("MMM D"),
                latest_tickets_week_day: moment(value.latest_tickets.ticketDate).format("ddd"),
                latest_tickets_time: moment(value.latest_tickets.ticketDate).format("LT")
              });
          });
          $scope.lvShows = result;
        }

        $("#artists").change(function() {
            var options = $(this).val();
            var result = [];
            $scope.artistOptions = options;

            $scope.artistFitered = true;

            if($scope.artistOptions == 'all'){
              $(this).val('');
              $scope.artistFitered = false;
              $scope.datesFitered = false;
              $scope.errorMessage = "";
              $scope.filterDatefrom = "";
              $scope.filterDateto = "";

              var result = [];
              var ticketDates = [];
              var eventInfo = res.data;
              $("#artists").each(function() { this.selectedIndex = 0 });

              angular.forEach(eventInfo, function(value, key) {
                  result.push({
                    show_name: value.name,
                    slug: value.slug,
                    artist_name: value.artists.name,
                    venue_name: value.venues.name,
                    venue_city: value.venues.city,
                    venue_state: value.venues.state,
                    featured_image: value.featured_image,
                    latest: value.latest_tickets,
                    tickets: value.tickets,
                    latest_tickets_month: moment(value.latest_tickets.ticketDate).format("MMM"),
                    latest_tickets_day: moment(value.latest_tickets.ticketDate).format("D"),
                    latest_tickets_date: moment(value.latest_tickets.ticketDate).format("MMM D"),
                    latest_tickets_week_day: moment(value.latest_tickets.ticketDate).format("ddd"),
                    latest_tickets_time: moment(value.latest_tickets.ticketDate).format("LT")
                  });
              });
              $scope.lvShows = result;
            } else if($scope.datesFitered == true){
              @foreach($tickets as $ticket)
                @if(isset($ticket->shows))
                  if ('{{$ticket->shows->artists->name}}'== options && moment('{{$ticket->ticketDate}}').format("YYYY-MM-DD") >= $scope.filterDatefrom  && $scope.filterDateto >= moment('{{$ticket->ticketDate}}').format("YYYY-MM-DD"))  {
                      result.push({
                        show_name: '{{$ticket->shows->name}}',
                        artist_name: '{{ $ticket->shows->artists->name }}',
                        venue_name: '{{ $ticket->shows->venues->name }}',
                        venue_city: '{{ $ticket->shows->venues->city }}',
                        venue_state: '{{ $ticket->shows->venues->state }}',
                        featured_image: '{{ $ticket->shows->featured_image }}',
                        latest_tickets_month: moment('{{$ticket->ticketDate}}').format("MMM"),
                        latest_tickets_day: moment('{{$ticket->ticketDate}}').format("D"),
                        latest_tickets_date: moment('{{$ticket->ticketDate}}').format("MMM D"),
                        latest_tickets_week_day: moment('{{$ticket->ticketDate}}').format("ddd"),
                        latest_tickets_time: moment('{{$ticket->ticketDate}}').format("LT"),
                        slug: '{{$ticket->shows->slug}}'
                      });
                   }
                @endif
              @endforeach

            } else if ($scope.artistFitered == true){
                @foreach($tickets as $ticket)
                  @if(isset($ticket->shows))
                    if ('{{$ticket->shows->artists->name}}' == options)  {
                        result.push({
                          show_name: '{{$ticket->shows->name}}',
                          artist_name: '{{ $ticket->shows->artists->name }}',
                          venue_name: '{{ $ticket->shows->venues->name }}',
                          venue_city: '{{ $ticket->shows->venues->city }}',
                          venue_state: '{{ $ticket->shows->venues->state }}',
                          featured_image: '{{ $ticket->shows->featured_image }}',
                          latest_tickets_month: moment('{{$ticket->ticketDate}}').format("MMM"),
                          latest_tickets_day: moment('{{$ticket->ticketDate}}').format("D"),
                          latest_tickets_date: moment('{{$ticket->ticketDate}}').format("MMM D"),
                          latest_tickets_week_day: moment('{{$ticket->ticketDate}}').format("ddd"),
                          latest_tickets_time: moment('{{$ticket->ticketDate}}').format("LT"),
                          slug: '{{$ticket->shows->slug}}'
                        });
                     }
                  @endif
                @endforeach
            }

            $scope.$apply( $scope.lvShows = result);
        });


      });
    })
  </script>

  @include('includes.footer')
