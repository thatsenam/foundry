<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('on_boarding')->default(0)->nullable();
            $table->string('role')->nullable();
            $table->boolean('newsletter')->default(0)->nullable();
            $table->string('community_style')->nullable();
            $table->string('account_type')->nullable();
            $table->boolean('monetize_community')->default(0)->nullable();
            $table->string('community_logo')->nullable();
            $table->string('community_banner')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_postal_code')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
