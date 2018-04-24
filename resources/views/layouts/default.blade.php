<!DOCTYPE html>
<html>
<head>
	<title>Loja</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<nav>
		<div class="nav-wrapper">
			<ul id="nav-mobile" class="left hide-on-med-and-down">
				<li><a href="#">Home</a></li>
				<li><a href="#">Sobre</a></li>
				<li><a href="#">Sair</a></li>
			</ul>
		</div>
	</nav>
	
	<section class="container">
	
		@yield('content')
	
	</section>
	
	<script type="text/javascript" src="{{ asset('js/jQuery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>