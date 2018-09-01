<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document', 12)->nullable();
            $table->string('documentType', 3)->nullable();
            $table->string('firstName', 60);
            $table->string('lastName', 60)->nullable();
            $table->string('company', 60)->nullable();
            $table->string('emailAddress', 80);
            $table->string('address', 100)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('country', 2)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('mobile', 30)->nullable();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
}
