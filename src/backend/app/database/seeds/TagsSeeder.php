<?php

class TagsSeeder extends Seeder
{
    public function run()
    {
        $tags = array_values(Lang::get('tags'));

        foreach ($tags as $tag) {
            Tag::create(array('name' => $tag));
        }
    }
}