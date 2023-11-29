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
        Schema::create('templet', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('color',8);
            $table->string('size_font',5);
            $table->string('family_font',20);
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
        Schema::table('templet', function (Blueprint $table) {
            $table->dropForeign(['cv_id']);
        });
    }
};
