<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('details')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->json('custom')->nullable();
			$table->timestamps();
		});
    DB::statement('ALTER TABLE leads ADD location POINT');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leads');
	}

}
