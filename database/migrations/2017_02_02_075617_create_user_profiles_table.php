<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->integer('user_id')->unique();
            $table->date('birth_date')->nullable();
            $table->string('about_me')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('telephone')->nullable();
            $table->string('skin_types')->nullable();
            $table->string('skin_problems')->nullable();
            $table->enum('skin_tone', ['pinky-fair', 'yellow-fair', '2tone', 'copper', 'dark'])->nullable();
            $table->enum('face_shape', ['diamond', 'heart', 'oblong', 'oval', 'round', 'square'])->nullable();
            $table->enum('body_shape', ['apple', 'banana', 'hourglass', 'pear', 'watermelon'])->nullable();
            $table->string('hair_types')->nullable();
            $table->string('hair_problems')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
