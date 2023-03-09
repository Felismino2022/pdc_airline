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
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('estado');
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
            'surname' => "Manuel",
            'email' => 'pedromanueltrs777@gmail.com',
            'password' => bcrypt('Niklaus'),
            'estado' => 1,
            'role_id' => 1
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
