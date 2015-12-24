@if (!is_null($posts) && $posts->count() > 0)

    @foreach ($posts as $post)
    <article class="short-article">
        <header>
            <h1>
                <a href="{{ action('PostController@show', $post->id) }}">{{ $post->title }}</a>
            </h1>
	        <time datetime="{{ $post->dateFormat() }}">{{ $post->date() }}</time>
        </header>
        <p class="short-article-tags">
	        <?php $counter = $post->tags()->count(); ?>
            @foreach ($post->tags()->get() as $tag)
	        <?php $counter--; ?>
            <a  href="{{ URL::route('search_tags', $tag->name) }}">
                {{ $tag->name }}</a><?php echo ($counter != 0) ? ',' : ''; ?>
            @endforeach
        </p>
    </article>
    @endforeach

@else
    <br>
    <div class="alert alert-danger">{{ trans('post.not_found') }}</div>
@endif