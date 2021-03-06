<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFramesizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('framesizes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('size');
            $table->string('combustor_type');
            $table->string('nox_injection');
            $table->string('frequency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('framesize');
    }
}
