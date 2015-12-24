<?php

class ExampleTest extends TestCase {


	public function testUserAuth()
	{
		$data = array('password' => '123');
		var_dump(Auth::attempt($data));
	}


    public function testGetTagsFromLangFile()
    {
        print_r(array_values(Lang::get('tags')));
    }

}