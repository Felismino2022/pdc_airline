<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilhetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilhetes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('data_compra');
            $table->string('hora_compra')->nullable();
            $table->string('codigo');
            $table->enum('tipo',['ida','idavolta'])->default('ida');
            $table->integer('user_id')->unsigned();
            $table->foreignId('voo_id')->constrained();
            $table->integer('qtd_passageiro')->unsigned()->nullable();
            $table->enum('state',['reembolsado','usado','confirmado','em processo'])->default('em processo');
            

            //doing relatioship with role
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            //doing relatioship with role

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
        Schema::dropIfExists('bilhetes');
    }
}
