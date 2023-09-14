<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForfaitUserTable extends Migration
{
    public function up()
    {
        Schema::create('forfait_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('forfait_id');
            $table->date('date_darriver');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('forfait_id')->references('id')->on('forfaits')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('forfait_user');
    }
}
