@extends('layouts.master')


@section('meta')
    <meta name="keywords" content="{{ $post->tagsToString() }}">
    <meta name="description" content="">
@stop


@section('opengraph')
    <meta property="og:title" content="{{ $post->title }}" />
	<meta property="og:type" content="article" />
    <meta property="og:url" content="{{ action('PostController@show', $post->id) }}" />
    <meta property="og:image" content="" />
	
    <meta property="og:description" content="" />
    <meta property="article:published_time" content="{{ $post->dateFormat() }}" />
	<meta property="article:author" content="{{ trans('app.author') }}" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@evgeniypakalo" />
	<meta name="twitter:creator" content="@evgeniypakalo" />
@stop


@section('title')
    {{ $post->title }}
@stop


@section('content')

<article class="full-article">
    <header>
        <h1>{{ $post->title }}</h1>
        <p class="color-gray-light">
	        <time datetime="{{ $post->dateFormat() }}">{{ $post->date() }}</time>
        </p>
    </header>

    <div class="article-content">{{ $post->text_html }}</div>

    @if (!Auth::guest())
    <p>{{ link_to_action('PostController@edit', trans('post.edit.link'), $post->id) }}</p>
    @endif

    <p class="full-article-tags">
	    <?php $counter = $post->tags()->count(); ?>
        @foreach ($post->tags()->get() as $tag)
	    <?php $counter--; ?>
        <a  href="{{ URL::route('search_tags', $tag->name) }}">
	        {{ $tag->name }}</a><?php echo ($counter != 0) ? ',' : ''; ?>
	    </a>
        @endforeach
    </p>
</article>

@if (!App::environment('local') && Config::get('app.comments_enabled'))
    <!-- Disqus -->
    <div id="disqus_thread"></div>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    <!--/ Disqus -->
@endif


@stop


@section('scripts')
@if (!App::environment('local'))
    {{--<script src="//<your-login>.disqus.com/embed.js"></script>--}}
@endif
{{ HTML::script('frontend/vendor/galleria/galleria-1.3.5.min.js') }}
{{ HTML::script('frontend/js/post.js') }}
@stop