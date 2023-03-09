<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('nome', ['adulto', 'crianca','bebe']);
            $table->timestamps();
        });

        DB::table('categorias')->insert([
            'nome' => 'adulto'
        ]);
        

        DB::table('roles')->insert([
            'nome' => 'crianca'
        ]);

        DB::table('roles')->insert([
            'nome' => 'bebe'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
