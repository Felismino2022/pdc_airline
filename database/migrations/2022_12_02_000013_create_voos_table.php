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
            $table->date('data_partida');
            $table->string('hora_partida');
            $table->date('data_regresso')->nullable();
            $table->string('hora_regresso')->nullable();
            $table->integer('origem_id')->unsigned();
            $table->integer('destino_id')->unsigned();
            $table->integer('ocupacao')->unsigned()->default(0);
            $table->string('imagem')->nullable();
            $table->string('str_lugar')->default('');

            $table->integer('frota_id')->unsigned();
            $table->enum('state',['agendado','concluido','cancelado','adiado'])->default('agendado');

            $table->unique(['data_partida', 'frota_id']);

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
