@extends('layouts.master')

@section('title')
    {{ trans('search.tags.title') }} &mdash; «{{{ $q }}}» | {{ trans('app.name') }}
@stop

@section('content')
<article class="full-article">
    <header>
        <h1>{{ trans('search.tags.title') }} &mdash; «{{{ $q }}}»</h1>
        <p class="color-gray-light">{{ trans('search.count_results') }}{{ $posts ? $posts->count() : 0 }}</p>
    </header>
</article>

@include('includes.posts')

@if ($posts)
    {{ $posts->links() }}
@endif
@stop