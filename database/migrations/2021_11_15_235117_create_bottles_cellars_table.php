<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBottlesCellarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bottles_cellars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bottle_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cellar_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bottles_cellars');
    }
}
