<!DOCTYPE html>
<html>
<head>
	<title>{{ trans('error.error') }} {{ $code }}</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oranienbaum&amp;subset=latin,cyrillic-ext,cyrillic,latin-ext">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;subset=latin,cyrillic">
    {{ HTML::style('frontend/vendor/kube/kube.min.css') }}
    {{ HTML::style('frontend/css/common.css') }}
</head>
<body>

<div class="units-container">
	<div class="units-row">
		<div class="unit-centered unit-50">
			<article>
				<header>
					<h1>{{ trans('error.error') }} <span class="color-red">{{ $code }}</span></h1>
					<h2>{{ $message }}</h2>
				</header>				
				<br>
				<p>{{ trans('error.info') }}</p>
				<nav class="navbar" role="navigation">
					<ul>
						@include('includes.navigation')
					</ul>
				</nav>
			</article>
		</div>
	</div>
</div>

@include('includes.counters')
</body>
</html>