<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');
			//$table->increments('id')->primary();
			$table->date('date_from')->nullable();
			$table->date('date_to')->nullable();
			$table->integer('organizing_company_id')->unsigned()->nullable();
			$table->string('country', 255);
			$table->string('city', 255);
			$table->string('event_url', 255)->nullable();
			$table->string('approval_status', 30)->default('not_approved');
			$table->string('title', 255)->nullable();
			$table->string('topic', 255)->nullable();
			$table->string('description', 1000)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}
