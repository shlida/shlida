<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBadgeReceiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_badge_receive', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('badge_id');
            $table->integer('badge_level');
            $table->timestamps();

            $table->unique(['user_id', 'badge_id', 'badge_level']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_badge_receive');
    }
}
