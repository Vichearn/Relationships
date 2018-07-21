<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Site</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
	  <a class="navbar-brand" href="#">Admin Manage</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown" style="list-style: none;">
		  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		      Admin &nbsp;
		      {{ Auth::user()->name }} <span class="caret"></span>
		  </a>

		  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		      <a class="dropdown-item" href="{{ route('logout') }}"
		         onclick="event.preventDefault();
		                       document.getElementById('logout-form').submit();">
		          {{ __('Logout') }}
		      </a>

		      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		          @csrf
		      </form>
		  </div>
		</li>
	  </ul>
	</nav>

	<br/>

	<div class="container">
		@yield('content')
	</div>
</body>
</html>