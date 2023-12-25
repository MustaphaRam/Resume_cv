<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('title_pro', 50);
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->date('date_birth',10);
            $table->string('gender',6);
            $table->string('image_profile',150)->nullable();
            $table->string('country',50)->nullable();
            $table->text('my_profile', 400)->nullable();
            $table->string('hobbies', 150)->nullable();
            $table->uuid('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');
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
        Schema::table('profile', function (Blueprint $table) {
            $table->dropForeign(['cv_id']);
        });
    }
};
