<?php

class HomeController extends Controller
{
    public function archive()
    {
        $search = Post::searchByTagName(Lang::get('tags.note'));
        $posts = is_null($search) ? null : $search->get();
        return View::make('home.archive', compact('posts'));
    }
	
	public function search()
	{
        return View::make('home.search');
	}
} 