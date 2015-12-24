<?php

class Tag extends Eloquent
{
    protected $table = 'tags';
    protected $fillable = array('name');

    public $timestamps = false;

    public static $validationRules = array(
        'name' => 'required|min:2|max:200|unique:tags,name'
    );

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    public static function forUsers()
    {
        return self::where('name', '<>', Lang::get('tags.closed'))
                    ->where('name', '<>', Lang::get('tags.draft'))
                    ->where('name', '<>', Lang::get('tags.page'))->get();
    }

    public static function forAdmin()
    {
        return self::all();
    }

}