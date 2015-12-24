<?php

use Helpers\ModelHelper;

/**
 * @property string title
 * @property mixed created_at
 * @property mixed text_html
 * @property mixed text_markdown
 */
class Post extends Eloquent
{
    protected $table = 'posts';
    protected $fillable = array('title', 'text_html', 'text_markdown');
    public $hasDescription = false;

    private $_pager;

    public static $validationRules = array(
        'title' => 'required|max:255',
        'text_html' => 'required|min:10',
        'text_markdown' => 'required|min:10',
    );

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function description()
    {
        preg_match('/(?P<d>.*?)<hr(.*)>(.*?)/s', $this->text_html, $matches);

        $this->hasDescription = isset($matches['d']);

        return trim($this->hasDescription ? $matches['d'] : $this->text_html);
    }

    public function date()
    {
        return \Helpers\Helper::convertDateToRussianDateFormat($this->created_at);
    }

	public function dateFormat()
	{
		return $this->created_at->toISO8601String();
	}

    public function tagsToString()
    {
        return implode(', ', $this->_tagsToArray());
    }

    public function saveTags($dataTags)
    {
        // current tags in post
        $oldTags = $this->_tagsToArray();

        // tags form Input
        $newTags = ModelHelper::convertTagsStringToArray($dataTags);

        // save tags
        $this->_saveTags(array_diff($newTags, $oldTags));

        // detach old tags
        if (count($oldTags) > 0) {
            $this->_detachTags(array_diff($oldTags, $newTags));
        }
    }

    public function deleteTags()
    {
        $this->_detachTags($this->_tagsToArray());
    }

    private function _tagsToArray()
    {
        $tags = array();
        foreach ($this->tags()->select('name')->get() as $tag) {
            $tags[] = $tag->name;
        }
        return $tags;
    }

    private function _saveTags($tags)
    {
        foreach ($tags as $tagName) {
            $tag = Tag::where('name', '=', $tagName)->first();

            if (is_null($tag)) {
                $this->tags()->save(Tag::create(array('name' => $tagName)));
            } else {
                $this->tags()->attach($tag->id);
            }
        }
    }

    private function _detachTags($tags)
    {
        foreach ($tags as $tagName) {
            $tag = Tag::where('name', '=', $tagName)->first();

            if (!is_null($tag)) {
                $this->tags()->detach($tag->id);
            }
        }
    }

    public static function searchByTagName($tagName)
    {
        $tag = self::_searchByTagName($tagName);
        return is_null($tag) ? null : $tag->posts()->orderBy('created_at', 'desc');
    }

    private static function _searchByTagName($tagName)
    {
    	return Tag::where('name', '=', $tagName)->first();
    }

    public static function pages()
    {
        $tag = self::_searchByTagName(Lang::get('tags.page'));
        return is_null($tag) ? null : $tag->posts()->orderBy('created_at')->get();
    }

    public function hasTag($tagName)
    {
        return in_array($tagName, $this->_tagsToArray());
    }


}