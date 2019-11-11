<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('company_id',true);
            $table->string('company_name', 55);
            $table->string('contact_name', 55);
            $table->string('contact_email')->unique();
            $table->string('contact_phone', 55)->unique();
            $table->string('company_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('organizations');
    }
}
