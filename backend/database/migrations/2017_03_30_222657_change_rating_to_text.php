<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRatingToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function($table) {
            $table->dropColumn('rating');
        });
        Schema::table('places', function($table) {
            $table->string('rating', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('places', function($table) {
            $table->dropColumn('rating');
        });
        Schema::table('places', function($table) {
            $table->decimal('rating', 1, 1);
        });
    }
}
