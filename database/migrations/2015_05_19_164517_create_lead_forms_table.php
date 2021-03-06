<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lead_forms', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('title');
      $table->json('photos');
      $table->json('textfields');
      $table->json('selects');
      $table->integer('location')->default(0);
      $table->string('email');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lead_forms');
	}

}
