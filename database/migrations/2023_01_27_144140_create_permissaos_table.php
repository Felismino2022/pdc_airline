<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('compra')->default("bloqueado");
            $table->string('tarifa')->default("bloqueado");
            $table->string('regalia')->default("bloqueado");
            $table->string('membro')->default("bloqueado");
            $table->string('frota')->default("bloqueado");
            $table->string('aeroporto')->default("bloqueado");
            $table->string('reclamacao')->default("bloqueado");
            $table->string('reembolso')->default("bloqueado");
            $table->string('utilizador')->default("bloqueado");
            $table->string('permissao')->default("bloqueado");
            $table->timestamps();
            $table->integer('user_id')->unsigned();

            //doing relatioship with role
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');


        });

        DB::table('permissaos')->insert([
            'compra'=>("tudo"),
            'tarifa'=>("tudo"),
            'regalia'=>("tudo"),
            'membro'=>("tudo"),
             'frota'=>("tudo"),
             'aeroporto'=>("tudo"),
             'reclamacao'=>("tudo"),
            'reembolso'=>("tudo"),
             'utilizador'=>("tudo"),
             'permissao'=>("tudo"),
        
             'user_id'=>(1)
         ]);
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissaos');
    }
}
