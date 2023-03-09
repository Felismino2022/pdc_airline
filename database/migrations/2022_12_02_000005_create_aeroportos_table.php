<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAeroportosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeroportos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('cidade',50);
            $table->string('pais',50);
            $table->timestamps();
            $table->enum('state',['activo','inativo'])->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aeroportos');
    }
}
