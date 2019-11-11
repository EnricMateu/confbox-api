<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('events', function(Blueprint $table) {
			$table->foreign('organizing_company_id')->references('company_id')->on('companies')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->foreign('volunteer_id')->references('id')->on('user_profiles')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
        Schema::table('user_profiles', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
	}

	public function down()
	{
		Schema::table('events', function(Blueprint $table) {
			$table->dropForeign('events_organizing_company_id_foreign');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->dropForeign('applications_volunteer_id_foreign');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->dropForeign('applications_event_id_foreign');
		});
	}
}