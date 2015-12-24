<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $t) {

			$t->increments('id');
			$t->string('name')->unique()->index();

		});

		Schema::create('post_tag', function($t) {

			$t->integer('post_id')->index();
			$t->integer('tag_id')->index();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tags');
		Schema::dropIfExists('post_tag');
	}

}