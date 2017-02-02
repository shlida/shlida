<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_channels', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('channel_name');
            $table->string('channel_url');
            $table->timestamps();

            $table->unique(['user_id', 'channel_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_social_channels');
    }
}
