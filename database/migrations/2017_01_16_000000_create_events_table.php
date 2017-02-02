<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('image_url');
            $table->enum('event_type', ['SALE', 'SHOP OPENING', 'PRODUCT LAUNCH', 'MARKET', 'FAIR', 'OPEN HOUSE']);
            $table->integer('published')->default(1);
            $table->integer('pinned')->default(0);
            $table->integer('added_by');
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
        Schema::dropIfExists('events');
    }
}
