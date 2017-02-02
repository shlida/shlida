<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwatchColorToneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swatch_color_tone', function (Blueprint $table) {
            $table->integer('swatch_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->timestamps();

            $table->unique(['swatch_id', 'color_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swatch_color_tone');
    }
}
