<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reembolsos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('bilhete_id')->unsigned();
            $table->text('descricao');
            $table->text('resposta')->nullable();
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
        Schema::dropIfExists('reembolsos');
    }
}
