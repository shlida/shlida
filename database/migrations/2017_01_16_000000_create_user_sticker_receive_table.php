<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStickerReceiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sticker_receive', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('sticker_id');
            $table->timestamps();

            $table->unique(['user_id', 'sticker_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_sticker_receive');
    }
}
