@extends('layouts.master')


@section('title')
    {{ isset($post) ? trans('post.edit.title') : trans('post.create.title') }}
@stop


@section('styles')
    {{ HTML::style('frontend/vendor/jqueryui/ui-lightness/jquery-ui-1.9.2.custom.min.css') }}
@stop


@section('content')
{{ Form::open(array('action' => 'PostController@store', 'class' => '', 'id' => 'posts-create')) }}

    {{ Form::hidden('id', isset($post) ? $post->id : '') }}

    @if (isset($post))
        <p>{{ link_to_action('PostController@show', trans('post.back'), $post->id) }}</p>
    @endif

    <div class="alert hide" data-error-header="{{ trans('post.error_header') }}"></div>

    <p>{{ Form::text('title', isset($post) ? $post->title : '', array('class' => 'width-100')) }}</p>

    <p class="blog-post-content">
        {{ Form::textarea('text_markdown', isset($post) ? $post->text_markdown : '', array('id' => 'ckeditor', 'class' => 'width-100')) }}
        {{ Form::hidden('text_html', '') }}
    </p>

    <!-- demo -->
    <main  class="blog-post-result">
        <article class="article-page">
            <div class="article-content"></div>
        </article>
    </main>
    <!-- ./demo -->

    <p>{{ Form::label('tags', trans('post.label_tags')) }}</p>
    <p>{{ Form::text('tags', isset($post) ? $post->tagsToString() : trans('tags.note'),
                array('class' => 'width-100 tags',
                    'data-autocomplete-url' => URL::route('all_tags'))) }}</p>

    <p>
        {{ Form::button(trans('post.button_submit'),
                array('data-loading-text' => trans('post.loading'),
                    'class' => 'btn btn-red loading',
	                'type' => 'submit')) }}
        <button type="button" class="btn btn-content-preview">
            {{ trans('post.button_content_preview') }}
        </button>

        @if (isset($post))
            <a href="{{ action('PostController@destroy', $post->id) }}"
                data-result-href="{{ action('PostController@index') }}"
                data-confirm="{{ trans('post.delete_confirm') }}"
                data-token="{{ csrf_token() }}"
                class="delete btn btn-outline btn-sm">{{ trans('post.delete') }}</a>
        @endif
    </p>

    <div class="post-create-info">
        <h4>{{ trans('post.tags.header') }}</h4>
        <ul class="list-unstyled">
            <li class="text-info"><code>{{ trans('tags.note') }}</code> &horbar; {{ trans('post.tags.note') }}</li>
            <li class="text-info"><code>{{ trans('tags.page') }}</code> &horbar; {{ trans('post.tags.page') }}</li>
            <li class="text-info"><code>{{ trans('tags.page') }}</code>,
                <code>{{ trans('tags.closed') }}</code>,
                <code>{{ trans('tags.draft') }}</code> &horbar; {{ trans('post.tags.hidden') }}</li>
        </ul>
    </div>

{{ Form::close() }}
@stop


@section('scripts')
    {{ HTML::script('frontend/vendor/jquery/jquery.form.js') }}
    {{ HTML::script('frontend/vendor/jqueryui/jquery-ui-1.9.2.custom.min.js') }}
    {{ HTML::script('frontend/vendor/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('frontend/vendor/marked/marked.js') }}
    {{ HTML::script('frontend/js/post.create.js') }}
@stop