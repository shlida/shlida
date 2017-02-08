<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentSaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_save', function (Blueprint $table) {
            $table->string('content_type', 10);
            $table->integer('content_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->unique(['content_type', 'content_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_save');
    }
}
