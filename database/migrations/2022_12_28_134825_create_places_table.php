<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->string('phone');
            $table->string('website');
            $table->string('office_hours');
            $table->text('address');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();

            // relationship category
            $table->foreign('category_id')->references('id')->on('categories');

            // relationship user
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
