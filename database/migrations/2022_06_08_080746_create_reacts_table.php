<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reacts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('type')->nullable();
            $table->string('type_id')->nullable();
            $table->integer('user_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reacts');
    }
}
