<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombustorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combustor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Combustor_Type');
            $table->string('Nox_Injection');
            $table->string('Frequency');
            $table->string('Generator_Mode');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combustor');
    }
}
