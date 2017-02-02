<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_point_log', function (Blueprint $table) {
            $table->integer('year');
            $table->integer('user_id')->unsigned();
            $table->integer('point_total')->default(0);
            $table->integer('point_used')->default(0);
            $table->integer('point_remain')->default(0);
            $table->timestamps();

            $table->unique(['year', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_point_log');
    }
}
