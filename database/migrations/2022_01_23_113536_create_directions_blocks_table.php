<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions_blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direction_id');
            $table->string('block1')->nullable();
            $table->string('block2')->nullable();
            $table->string('block3')->nullable();
            $table->text('block4')->nullable();
            $table->string('block4_img')->nullable();
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');
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
        Schema::dropIfExists('directions_blocks');
    }
}
