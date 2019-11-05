<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');
			$table->bigInteger('volunteer_id')->unsigned()->nullable();
			$table->string('status')->default(0);
			$table->bigInteger('event_id')->unsigned()->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('applications');
	}
}
