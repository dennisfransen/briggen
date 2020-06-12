<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("stamps", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("corporation_id");
            $table->unsignedBigInteger("user_id");
            $table->integer("count");
            $table->timestamps();

            $table->foreign("corporation_id")
                ->references("id")
                ->on("corporations")
                ->onDelete("cascade");
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("stamps");
    }
}
