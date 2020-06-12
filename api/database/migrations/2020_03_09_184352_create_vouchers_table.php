<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("vouchers", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("corporation_id");
            $table->string("code");
            $table->integer("value")->default(1);
            $table->integer("uses")->default(-1);
            $table->timestamps();

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
        Schema::dropIfExists("vouchers");
    }
}
