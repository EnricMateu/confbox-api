<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('organizations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('company_id', true);
			$table->string('organization_name', 55)->nullable();
			$table->string('contact_name', 55)->nullable();
			$table->string('contact_email')->unique();
			$table->string('contact_phone', 55)->unique()->nullable();
			$table->string('organization_url')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('organizations');
	}
}
