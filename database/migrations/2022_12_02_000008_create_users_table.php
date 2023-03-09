<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo',['root','normal']);
            $table->enum('titulo',['SR','DR','SRA'])->nullable();
            $table->string('phone');
            $table->string('name',50);
            $table->string('surname',50);
            $table->enum('gender',['M','F']);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('state',['activo','inativo'])->default('activo');
            $table->rememberToken();
            $table->integer('role_id')->unsigned();

            //doing relatioship with role
            $table->foreign('role_id')
            ->references('id')->on('roles')
            ->onDelete('cascade');

            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Pedro",
            'titulo' => "SR",
            'surname' => "Manuel",
            'gender' => "M",
            'email' => 'pedromanueltrs777@gmail.com',
            'password' => bcrypt('admin123'),
            'state' => 'activo',
            'tipo' => 'root',
            'role_id' => 1,
            'phone' =>'987876876'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
