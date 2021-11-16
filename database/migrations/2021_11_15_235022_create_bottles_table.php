<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBottlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bottles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('color', 20);
            $table->integer('ml_quantity');
            $table->string('country', 255);
            $table->string('code', 255);
            $table->integer('price');
            $table->string('image_link', 255);
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
        Schema::dropIfExists('bottles');
    }
}
