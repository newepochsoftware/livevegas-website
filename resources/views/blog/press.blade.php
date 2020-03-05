<script type="application/ld+json">
[
  @foreach($blogs as $blog)
  {
    "@context": "http://schema.org/",
    "@type": "Blog",
    "blogPost": {
      "@type": "BlogPosting",
      "headline": "{!! str_limit( $blog->title, $limit = 105) !!}",
      "mainEntityOfPage": "{!! str_limit( $blog->title, $limit = 105) !!}",
      "datePublished": "{{ date('c', strtotime($blog->created_at)) }}",
      "dateModified": "{{ date('c', strtotime($blog->created_at)) }}",
      "text": "{!! str_limit( $blog->description, $limit = 105) !!}",
      "image": {
        "@type": "ImageObject",
        "url": "{{ $blog->featured_image }}"
      },
      "author": {
        "@type": "Organization",
        "name": "Live Nation",
        "logo": {
          "@type": "ImageObject",
          "url": "https://www.livevegas.com/images/logo.png"
        }
      },
      "publisher": {
        "@type": "Organization",
        "name": "Live Nation",
        "logo": {
          "@type": "ImageObject",
          "url": "https://www.livevegas.com/images/logo.png"
        }
      }
    }
  }@if (!$loop->last),@endif
    @endforeach
]
</script>
@extends('layouts.press')

@section('content')
<div class="blog">
  <div class="container">

      <div class="row">

        <div class="col-md-8">
          <div class="artist-show-page-titles">Latest Press</div>
          @foreach($blogs as $blog)
          <div class="blog-container">
              <div class="blog-featured-img">
                <a href="/blog/{{ $blog->slug }}"><img src="{{ $blog->featured_image }}"></a>
              </div>

              <div class="blog-pre-txt">
                <div class="blog-titles">{{$blog->title}}</div>
                <div class="show-location-dates">
                   {{ date('D', strtotime($blog->created_at)) }} •
                   {{ date('M j', strtotime($blog->created_at)) }} •
                   {{ date('g:i a', strtotime($blog->created_at)) }}
                </div>
                {!! str_limit( $blog->description, $limit = 100) !!}
                <div class="artist-get-tickets">
                  <a href="/blog/{{ $blog->slug }}" class="btn btn-danger btn-lg btn-block">Read More</a>
                </div>
              </div>
          </div>
          @endforeach

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
