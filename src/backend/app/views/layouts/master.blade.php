<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name='yandex-verification' content='' />
    
    <meta name="author" content="{{ trans('app.author') }}">
    @yield('meta')
    @yield('opengraph')

    <title> @yield('title') </title>

    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    {{ HTML::style('frontend/vendor/kube/kube.min.css') }}
    {{ HTML::style('frontend/vendor/highlight/styles/github.min.css') }}
	@if (App::environment('local'))
		{{ HTML::style('frontend/css/common.css') }}
	@else
		{{ HTML::style('frontend/css/common.min.css?v=1.0') }}
	@endif

    @yield('styles')

    <!-- HTML5 elements in less than IE9, yes please! -->
    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
		<body>


	<div class="units-container">

		<div class="units-row units-split">
			<div class="unit-100">

				<!-- navigation -->
				<header>
					<nav id="nav" class="navbar">
						<label for="navbar-toggle-checkbox" class="navbar-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" height="29" viewBox="0 0 48 48" width="48">
								<path d="M0 0h48v48h-48z" fill="none"></path>
								<path d="M6 36h36v-4h-36v4zm0-10h36v-4h-36v4zm0-14v4h36v-4h-36z"></path>
							</svg>
						</label>
						<input id="navbar-toggle-checkbox" type="checkbox">
						
						<ul class="navbar-items">
							@include('includes.navigation')

							<?php $pages = Post::pages(); ?>
							@if (!is_null($pages))
							@foreach ($pages as $page)
							<li>
								<a href="{{ action('PostController@show', $page->id)}}">
									{{ $page->title }}
								</a>
							</li>
							@endforeach
							@endif
						</ul>
					</nav>

				</header>
				<!-- ./navigation -->

			</div>

			@if (Auth::user())
			<div class="units-row-end units-split">
				<div class="unit-100">
					<nav class="navbar nav-menu">
						<ul>
							<li>
								<a href="{{ action('PostController@create')}}">{{ Lang::get('app.nav.create') }}</a>
							</li>
							<li>
								<a href="{{ action('UserController@logout')}}">{{ Lang::get('app.nav.logout') }}</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			@endif

		</div>

	    <div class="units-row units-padding units-split">
	        <!-- content -->
	        <div class="unit-100 unit-white">
	            <main role="main">
	                @yield('content')
	            </main>
	        </div>
	        <!-- ./content -->
	    </div>

		<div class="units-row units-padding units-split">
			<!-- sidebar -->
			<div class="unit-100 unit-white">
				<!-- search -->
				<section id="ya-search-custom">
					<div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'{{ route('search') }}','arrow':false,'bg':'transparent','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск по блогу Пакало Евгения','suggest':true,'target':'_self','tld':'ru','type':2,'usebigdictionary':true,'searchid':2233074,'webopt':false,'websearch':false,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':null,'input_placeholderColor':'#000000','input_borderColor':'#cccccc'}">
						<form action="http://yandex.ru/sitesearch" method="get" target="_self">
							<input type="hidden" name="searchid" value="2233074"/>
							<input type="hidden" name="l10n" value="ru"/>
							<input type="hidden" name="reqenc" value=""/>
							<input type="search" name="text" value=""/>
							<input type="submit" value="Найти" class="btn"/>
						</form>
					</div>
				</section>
				<!-- ./search -->
			</div>
			<!-- ./sidebar -->
		</div>
		
		<div class="units-row units-padding units-split">
			<!-- sidebar -->
			<div class="unit-100 unit-white">
				<!-- tags -->
				<section>
					<div>
						<?php $s_tags = Auth::user() ? Tag::forAdmin() : Tag::forUsers() ?>
						@if (!is_null($s_tags))
						@foreach ($s_tags as $s_tag)
						<a href="{{ URL::route('search_tags', $s_tag->name) }}"
						   class="btn btn-tag">{{ $s_tag->name }}</a>
						@endforeach
						@endif
					</div>
				</section>
				<!-- ./tags -->
			</div>
			<!-- ./sidebar -->
		</div>
	</div>

    @if (App::environment('local'))
        {{ HTML::script('frontend/vendor/jquery/jquery-2.1.0.min.js') }}
    @else
        <script src="//yandex.st/jquery/2.1.0/jquery.min.js"></script>
    @endif
    {{ HTML::script('frontend/vendor/highlight/highlight.pack.js') }}
	{{ HTML::script('frontend/vendor/highlightjs-line-numbers/highlightjs-line-numbers.min.js?v=1.0.2') }}
	@if (App::environment('local'))
        {{ HTML::script('frontend/js/common.js') }}
	@else
		{{ HTML::script('frontend/js/common.min.js?v=1.0') }}
	@endif
    @yield('scripts')

	@include('includes.counters')
	
</body>
</html>