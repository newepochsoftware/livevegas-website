@extends('layouts.press')

@section('content')
<div class="blog">
  <div class="container">


    <div class="blog-container">
      <div class="blog-titles" style="text-align:center;">{{$blogs->title}}</div>
      <div class="show-location-dates" style="text-align:center;">
         {{ date('D', strtotime($blogs->created_at)) }} •
         {{ date('M j', strtotime($blogs->created_at)) }} •
         {{ date('g:i a', strtotime($blogs->created_at)) }}
      </div>
    </div>


      <div class="row">

        <div class="col-md-8">
          <div class="artist-show-page-titles">Press</div>

          <div class="blog-container">
              <img src="{{ $blogs->featured_image }}" class="blog-featured-image">
              {!! $blogs->description !!}
          </div>
        </div>

        <div class="col-md-4">
          <div class="artist-show-page-titles">Upcoming Shows</div>
          <div class="sidebar-container">

            @foreach($tickets->slice(0, 7) as $ticket)
              @if(isset($ticket->shows))
              <a href="{{ $ticket->ticket_url }}">
              <div class="blog-show-container">
                <div class="blog-purchase-info">

                  <div class="blog-artist-thumb">
                    <img src="{{ $ticket->shows->featured_image }}">
                  </diV>

                  <div class="blog-artist-main-ticket-location">
                    <div class="blog-show-page-title">{{ $ticket->shows->artists->name }} - {{ $ticket->shows->name }}</div>
                    <div class="blog-show-page-subtitle">{{ $ticket->shows->venues->name }}, {{ $ticket->shows->venues->city }}, {{ $ticket->shows->venues->state }}</div>
                    <div class="blog-artist-show-location-dates">
                      {{ date('D ', strtotime($ticket->ticketDate)) }} •
                      {{ date('M j', strtotime($ticket->ticketDate)) }} •
                      {{ date('g:i A ', strtotime($ticket->ticketDate)) }}
                    </div>
                  </div>

                </div>
              </div>
              </a>
              @endif
            @endforeach
          </div>
          <a class="more-shows-btn" href="/all-shows">More Shows</a>

        </div>

      </div>

  </div>
</div>

<script src="{{ asset('js/lib/summernote/summernote.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.summernote').summernote();
  });
</script>
@endsection
