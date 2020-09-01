<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStarValueToCorporations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("corporations", function (Blueprint $table) {
            $table->float("star_value", 2, 1)->default(5.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("corporations", function (Blueprint $table) {
            $table->dropColumn("star_value");
        });
    }
}
