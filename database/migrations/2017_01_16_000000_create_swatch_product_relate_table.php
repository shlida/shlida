<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwatchProductRelateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swatch_product_relate', function (Blueprint $table) {
            $table->integer('swatch_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('position_x');
            $table->integer('position_y');
            $table->timestamps();

            $table->unique(['swatch_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swatch_product_relate');
    }
}
