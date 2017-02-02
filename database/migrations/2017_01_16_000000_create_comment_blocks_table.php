<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned();
            $table->integer('block_order');
            $table->string('block_type');
            $table->string('config');
            $table->string('content');
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
        Schema::dropIfExists('comment_blocks');
    }
}
