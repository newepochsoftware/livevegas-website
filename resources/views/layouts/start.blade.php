<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
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
  <link rel="stylesheet" href="{{ asset('css/separate/pages/login.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
								<div class="login-logo">
										<img src="{{ asset('images/logo.png') }}">
								</div>
                @yield('content')
            </div>
        </div>
    </div><!--.page-center-->


<script type="text/javascript" src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
<script>
    $(function() {
        $('.page-center').matchHeight({
            target: $('html')
        });

        $(window).resize(function(){
            setTimeout(function(){
                $('.page-center').matchHeight({ remove: true });
                $('.page-center').matchHeight({
                    target: $('html')
                });
            },100);
        });
    });
</script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
