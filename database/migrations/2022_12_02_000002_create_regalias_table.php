<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegaliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regalias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });


        DB::table('regalias')->insert([
            'nome' => 'suite'
        ]);

        DB::table('regalias')->insert([
            'nome' => 'cassifo_individual'
            
        ]);

        DB::table('regalias')->insert([
            'nome' => 'televisao'
        ]);

        DB::table('regalias')->insert([
            'nome' => 'refeicao'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regalias');
    }
}
