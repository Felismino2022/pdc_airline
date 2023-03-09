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
            $table->datetime('birthday');
            $table->string('idiom');
            $table->string('address');
            $table->string('numero_de_membro');
            $table->integer('miles')->default(0);
            $table->integer('preferencia_id')->unsigned();
            $table->integer('user_id')->unsigned();
            

             //doing relatioship with role
             $table->foreign('user_id')
             ->references('id')->on('users')
             ->onDelete('cascade');

             //doing relatioship with preference
             $table->foreign('preferencia_id')
             ->references('id')->on('preferencias')
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
