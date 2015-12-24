<?php

use Helpers\ControllerHelper;
use Helpers\ModelHelper;

class PostController extends Controller
{

	/**
	 * Index page the specified resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $search = Post::searchByTagName(Lang::get('tags.note'));
        $posts = is_null($search) ? null : $search->paginate(Config::get('app.posts_count'));
		return View::make('post.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('post.create');
	}

	/**
	 * Store the specified resource.
	 *
	 * @return Response
	 */
	public function store()
	{
		return ControllerHelper::ajaxWrapper(function($data){

			// validation data
			$validator = Validator::make($data, Post::$validationRules);
			if ($validator->fails()) {
				throw new Exception(ModelHelper::getValidationErrorsHtml($validator));
			} else {
				$post = Post::find($data['id']);
				if (is_null($post)) {
					$post = new Post();
				}

				$post->title = trim($data['title']);
                $post->text_html = $data['text_html'];
				$post->text_markdown = $data['text_markdown'];

				if ($post->save()) {
					$post->saveTags($data['tags']);
					return Lang::get('post.create.ok');
				} else {
					throw new Exception(Lang::get('post.create.db_error'));
				}
			}

		}, Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $post = Post::find($id);
        if ($post && !(Auth::guest() && $post->hasTag(Lang::get('tags.closed'))))
        {
            return View::make('post.show', compact('post'));
        }
        App::abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('post.create', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return ControllerHelper::ajaxWrapper(function($params){

			$post = Post::find($params['id']);
			$post->deleteTags();

			return $post->delete();

		}, compact('id'));
	}

}