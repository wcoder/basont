<?php

class TagController extends Controller
{
    public function all()
    {
        $tags = Tag::all();
        $result = array();
        foreach ($tags as $tag) {
            $result[] = array(
                'id' => $tag->id,
                'label' => $tag->name,
                'value' => $tag->name,
            );
        }
        return Response::json($result);
    }

    public function search($q)
    {
        $search = (Auth::guest() && ($q == Lang::get('tags.closed')))
                ? null
                : Post::searchByTagName($q);

        $posts = is_null($search) ? null : $search->paginate(Config::get('app.posts_count'));
        return View::make('search.tags', compact('posts', 'q'));
    }
}