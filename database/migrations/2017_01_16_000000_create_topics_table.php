<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('topic_type', ['HOWTO', 'REVIEW', 'HAUL', 'QA', 'STORY']);
            $table->string('title');
            $table->integer('user_id')->unsigned();
            $table->integer('published')->default(0);
            $table->datetime('published_on');
            $table->integer('drafted')->default(1);
            $table->datetime('scheduled_on');
            $table->string('cover_url');
            $table->integer('lived')->default(0);
            $table->integer('allow_only_member_view')->default(0);
            $table->integer('allow_only_member_comment')->default(1);
            $table->integer('allow_image_in_comment')->default(1);
            $table->integer('allow_social_share')->default(1);
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
        Schema::dropIfExists('topics');
    }
}
