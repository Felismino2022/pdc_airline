<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voos', function (Blueprint $table) {
            $table->id();
            $table->timestamps('data_partida');
            $table->timestamps('data_regresso');
            $table->integer('origem_id')->unsigned();
            $table->integer('destino_id')->unsigned();
            $table->integer('tarifa_id')->unsigned();
            $table->integer('frota_id')->unsigned();

             //doing relatioship with role
             $table->foreign('origem_id')
             ->references('id')->on('aeroportos')
             ->onDelete('cascade');

             $table->foreign('frota_id')
             ->references('id')->on('frotas')
             ->onDelete('cascade');

             //doing relatioship with preference
             $table->foreign('destino_id')
             ->references('id')->on('aeroportos')
             ->onDelete('cascade');


            //doing relatioship with preference
             $table->foreign('tarifa_id')
             ->references('id')->on('tarifas')
             ->onDelete('cascade');

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
        Schema::dropIfExists('voos');
    }
}
