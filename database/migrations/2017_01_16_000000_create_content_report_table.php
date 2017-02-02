<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_report', function (Blueprint $table) {
            $table->string('content_type');
            $table->integer('content_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('reason_id')->unsigned();
            $table->string('remarks');
            $table->integer('reviewed')->default(0);
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
        Schema::dropIfExists('content_report');
    }
}
