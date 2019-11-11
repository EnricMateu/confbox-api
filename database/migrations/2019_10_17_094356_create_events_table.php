<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration
{

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');
			$table->date('date_from')->nullable();
			$table->date('date_to')->nullable();
            $table->unsignedInteger('organizing_company_id')->nullable();
            $table->string('country', 255);
            $table->string('city', 255);
            $table->string('event_url', 255);
            //$table->string('approval_status', 30)->default('not_approved');
			$table->string('approval_status')->default(0);
            $table->string('title', 255);
            $table->string('topic', 255);
            $table->string('description', 1000);
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
