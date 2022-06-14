<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
            $table->string('user_name');
            $table->text('review_text');
            $table->unsignedBigInteger('drink_id')->unsigned()->nullable();
            $table->foreign('drink_id')
                ->references('id')
                ->on('drinks')
                ->onDelete('CASCADE');
            $table->integer('stars');
            // rating (stars/count of reviews/rating)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
