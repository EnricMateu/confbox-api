<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');
			$table->unsignedBigInteger('volunteer_id')->nullable();
			$table->string('status', 55)->default('not_approved');
			$table->integer('event_id')->unsigned()->nullable();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('street_address');
			$table->string('city');
			$table->string('country');
			$table->integer('postcode');
			$table->string('email');
			$table->string('phone');
			$table->string('linkedin_url');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('applications');
	}
}
