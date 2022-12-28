<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_id');
            $table->string('image');
            $table->timestamps();

            // relationship place
            $table->foreign('place_id')->references('id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_images');
    }
}
