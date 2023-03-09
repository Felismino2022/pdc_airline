<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->enum('nome', ['discount', 'basic','classic','plus','executive']);
            $table->decimal('preco')->default(0.0);
            $table->enum('unidade', ['KZ', 'USD','EU'])->default('KZ');
            $table->timestamps();
        });

        DB::table('tarifas')->insert([
            'nome' => 'basic'
        ]);

        DB::table('tarifas')->insert([
            'nome' => 'discount'
            
        ]);

        DB::table('tarifas')->insert([
            'nome' => 'classic'
        ]);

        DB::table('tarifas')->insert([
            'nome' => 'plus'
        ]);

        DB::table('tarifas')->insert([
            'nome' => 'executive'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifas');
    }
}
