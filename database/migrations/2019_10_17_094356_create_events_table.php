<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');
			$table->date('date_from')->nullable();
			$table->date('date_to')->nullable();
			$table->integer('organizing_company_id')->unsigned()->nullable();
			$table->string('country');
			$table->string('city');
			$table->string('event_url')->nullable();
			$table->string('approval_status')->default(0);
			$table->string('title')->nullable();
			$table->string('topic')->nullable();
			$table->string('description')->nullable();
			$table->string('img')->default('https://via.placeholder.com/150');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}
