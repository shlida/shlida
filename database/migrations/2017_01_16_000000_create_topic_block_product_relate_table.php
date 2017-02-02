<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicBlockProductRelateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_block_product_relate', function (Blueprint $table) {
            $table->integer('block_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();

            $table->unique(['block_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_block_product_relate');
    }
}
