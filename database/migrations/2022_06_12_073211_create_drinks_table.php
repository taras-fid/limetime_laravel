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
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img_name');
            $table->text('description');
            $table->integer('price_250');
            $table->integer('price_500');
            $table->integer('price_1000');
            $table->integer('stars')->nullable(true);
            $table->integer('rev_count')->nullable(true);
            // rating (stars_of_rev*count of reviews/count of reviews)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
};
