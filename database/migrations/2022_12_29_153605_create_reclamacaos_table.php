<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('data_reclamacao');
            $table->text('descricao');
            $table->text('resposta')->nullable();
            $table->integer('bilhete_id')->unsigned();
            $table->timestamps();
            $table->enum('estado',['avaliacao','aceite','negado'])->default('avaliacao');

            $table->foreign('bilhete_id')
            ->references('id')->on('bilhetes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamacaos');
    }
}
