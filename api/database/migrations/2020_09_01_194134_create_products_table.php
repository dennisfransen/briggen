<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("products", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("corporation_id");
            $table->string("title");
            $table->text("description")->default("");
            $table->text("image_url")->default("");
            $table->float("star_value", 2, 1)->default(5.0);
            $table->float("price", 7, 2)->default(0.0);

            $table->foreign("corporation_id")
                ->references("id")
                ->on("corporations")
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
        Schema::dropIfExists("products");
    }
}
