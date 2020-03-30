<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_place', function (Blueprint $table) {
            $table->increments('id');

            // Category relationship
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');

            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')
                ->on('places')->onDelete('cascade');

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
        Schema::dropIfExists('category_place');
    }
}
