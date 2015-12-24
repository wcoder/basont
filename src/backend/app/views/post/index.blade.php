@extends('layouts.master')


@section('meta')
    <meta name="description" content="{{ trans('app.description') }}">
@stop


@section('opengraph')
    <meta property="og:title" content="{{ trans('app.title') }}" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	
    <meta property="og:site_name" content="{{ trans('app.name') }}" />
    <meta property="og:description" content="{{ trans('app.description') }}" />
	<meta property="og:locale" content="ru_RU" />
	
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@evgeniypakalo" />
	<meta name="twitter:creator" content="@evgeniypakalo" />
	
@stop


@section('title')
    {{ trans('app.title') }}
@stop


@section('content')
	{{--
	<article class="full-article">
        <header>
            <h1>{{ trans('app.name') }}</h1>
            <p class="color-gray-light">{{ trans('app.description') }}</p>
        </header>
    </article>
	--}}
    @include('includes.posts')

    @if ($posts)
        {{ $posts->links() }}
    @endif
@stop