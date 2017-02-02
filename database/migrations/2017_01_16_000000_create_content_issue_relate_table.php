<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentIssueRelateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_issue_relate', function (Blueprint $table) {
            $table->string('content_type');
            $table->integer('content_id')->unsigned();
            $table->integer('issue_id')->unsigned();
            $table->timestamps();

            $table->unique(['content_type', 'content_id', 'issue_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_issue_relate');
    }
}
