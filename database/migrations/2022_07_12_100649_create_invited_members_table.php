<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitedMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invited_members', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('community_id');
            $table->string('invited_by');
            $table->string('status')->default('pending')->nullable();
            $table->string('invite_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invited_members');
    }
}
