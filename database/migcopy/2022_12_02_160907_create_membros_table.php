<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->timestamp('aniversario');
            $table->string('genero');
            $table->string('idioma');
            $table->string('morada');
            $table->string('telefone');
            $table->string('pin');
            $table->integer('milha')->unsigned();

            $table->integer('preferencia_id')->unsigned();
            $table->integer('regalia_id')->unsigned();
            $table->integer('user_id')->unsigned();

             //doing relatioship with role
             $table->foreign('user_id')
             ->references('id')->on('user')
             ->onDelete('cascade');

             //doing relatioship with preference
             $table->foreign('preferencia_id')
             ->references('id')->on('preferencias')
             ->onDelete('cascade');

            //doing relatioship with preference
            $table->foreign('regalia_id')
            ->references('id')->on('regalias')
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
        Schema::dropIfExists('membros');
    }
}
