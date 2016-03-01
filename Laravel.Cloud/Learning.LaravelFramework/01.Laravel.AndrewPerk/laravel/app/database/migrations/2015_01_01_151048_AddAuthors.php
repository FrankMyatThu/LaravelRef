<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		DB::table('authors')->insert(array(
				'name' 		=> 'Andrew Perkins 1',
				'bio'		=> 'Andrew Perkin 1 is a really greate author.',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));

		DB::table('authors')->insert(array(
				'name' 		=> 'Andrew Perkins 2',
				'bio'		=> 'Andrew Perkin 2 is a really greate author.',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));

		DB::table('authors')->insert(array(
				'name' 		=> 'Andrew Perkins 3',
				'bio'		=> 'Andrew Perkin 3 is a really greate author.',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));

		DB::table('authors')->insert(array(
				'name' 		=> 'Andrew Perkins 4',
				'bio'		=> 'Andrew Perkin 4 is a really greate author.',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));

		DB::table('authors')->insert(array(
				'name' 		=> 'Andrew Perkins 5',
				'bio'		=> 'Andrew Perkin 5 is a really greate author.',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));

		DB::table('authors')->insert(array(
				'name' 		=> 'Andrew Perkins 6',
				'bio'		=> 'Andrew Perkin 6 is a really greate author.',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('authors')->where('name', '=', 'Andrew Perkins 1')->delete();
		DB::table('authors')->where('name', '=', 'Andrew Perkins 2')->delete();
		DB::table('authors')->where('name', '=', 'Andrew Perkins 3')->delete();
		DB::table('authors')->where('name', '=', 'Andrew Perkins 4')->delete();
		DB::table('authors')->where('name', '=', 'Andrew Perkins 5')->delete();
		DB::table('authors')->where('name', '=', 'Andrew Perkins 6')->delete();
	}

}
