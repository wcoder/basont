@extends('layouts.master')


@section('title')
{{ trans('archive.title') }} | {{ trans('app.name') }}
@stop


@section('content')
<article class="full-article archive-page">
    <header>
        <h1>{{ trans('archive.title') }}</h1>
    </header>

    <p></p>


@if ($posts)
    <?php $month = ""; $year = ""; ?>
    @foreach ($posts as $post)
        <?php
            $date = date_parse($post->created_at);
            if ($date['year'] != $year)
            {
                $year = $date['year'];
                echo '<h2>' . $year . '</h2>';
            }
            if ($date['month'] != $month)
            {
                $month = $date['month'];
                echo '<h3>' . \Helpers\Helper::convertMonthToRussianMonthNameSingle($month) . '</h3>';
            }
        ?>
        <p>
            <a href="{{ action('PostController@show', $post->id) }}">{{ $post->title }}</a>
        </p>
    @endforeach
</article>
@else
    </article>
    <div class="alert alert-danger">{{ trans('post.not_found') }}</div>
@endif
@stop