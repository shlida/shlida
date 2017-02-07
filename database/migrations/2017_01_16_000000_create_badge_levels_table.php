<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_levels', function (Blueprint $table) {
            $table->integer('badge_id')->unsigned();
            $table->integer('badge_level')->unsigned();
            $table->string('image_url');
            $table->text('description');
            $table->timestamps();

            $table->unique(['badge_id', 'badge_level']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badge_levels');
    }
}
