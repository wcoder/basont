<!DOCTYPE html>
<html>
<head>
	<title>{{ trans('error.error') }} {{ $code }}</title>
	{{ HTML::style('frontend/vendor/kube/kube.min.css') }}
</head>
<body>

<div class="units-row">
	<div class="unit-centered unit-50">
		<article>
			<header>
				<h1>{{ trans('error.error') }} {{ $code }}</h1>
				<h4>{{ $message }}</h4>
			</header>

			<nav class="navbar">
				<ul>
					@include('includes.navigation')
				</ul>
			</nav>

			<footer>
				
			</footer>
		</article>
	</div>
</div>

</body>
</html>