<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon"> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="{{ asset('css/lib/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-daterangepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/lib/prism/prism.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>
</head>
<body class="with-side-menu">

	<header class="site-header">
	    <div class="container-fluid">
	        <div class="backend-logo">
	            <!-- <img class="hidden-md-down" src="img/logo-2.png" alt="">
	            <img class="hidden-lg-down" src="img/logo-2-mob.png" alt=""> -->
              <img src="{{ asset('images/logo.png') }}">
	        </div>

	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">

	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="{{ asset('img/avatar-2-64.png') }}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="/"><span class="font-icon glyphicon glyphicon-user"></span>Home</a>
	                            <!-- <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a> -->
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="/logout"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>

	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->

	                <div class="mobile-menu-right-overlay"></div>
	                <!-- <div class="site-header-collapsed"> -->
	                    <div class="site-header-collapsed-in">

	                        <div class="site-header-search-container">
	                            <form class="site-header-search closed">
	                                <input type="text" placeholder="Search"/>
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                                <div class="overlay"></div>
	                            </form>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
        <li class="red with-sub">
          <span>
            <i class="font-icon glyphicon glyphicon-user"></i>
            <span class="lbl">Artists</span>
          </span>
          <ul>
              <li><a href="/all"><span class="lbl">All Artists</span></a></li>
              <li><a href="/artist/create"><span class="lbl">Add Artist</span></a></li>
          </ul>
        </li>
        <li class="red with-sub">
            <span>
              <i class="font-icon glyphicon glyphicon-headphones"></i>
              <span class="lbl">Shows</span>
            </span>
            <ul>
                <li><a href="/shows"><span class="lbl">All Shows</span></a></li>
                <li><a href="/shows/create"><span class="lbl">Add Show</span></a></li>
            </ul>
        </li>
        <li class="red with-sub">
          <span>
              <i class="font-icon font-icon-home"></i>
              <span class="lbl">Venues</span>
          </span>
          <ul>
              <li><a href="/venues"><span class="lbl">All Venues</span></a></li>
              <li><a href="/venues/create"><span class="lbl">Add Venue</span></a></li>
          </ul>
        </li>
        <li class="red with-sub">
          <span>
            <i class="font-icon glyphicon glyphicon-picture"></i>
            <span class="lbl">Hero Images</span>
          </span>
          <ul>
              <li><a href="/hero"><span class="lbl">All Images</span></a></li>
              <li><a href="/hero/create"><span class="lbl">Add Image</span></a></li>
          </ul>
        </li>
        <li class="red with-sub">
          <span>
            <i class="font-icon glyphicon glyphicon-pencil"></i>
            <span class="lbl">Blog</span>
          </span>
          <ul>
              <li><a href="/blog"><span class="lbl">All Blog Posts</span></a></li>
              <li><a href="/blog/create"><span class="lbl">Add Blog Post</span></a></li>
          </ul>
        </li>
      </ul>
	</nav><!--.side-menu-->

	<div class="page-content">
    @yield('content')
	</div><!--.page-content-->



<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
