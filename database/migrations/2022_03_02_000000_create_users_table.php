<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Telefono');
            $table->unsignedBigInteger('id_rol')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_rol')->references('id')->on('rols')->onDelete('cascade');
        });
        DB::table('usuario')->insert([
            ['name' => 'administrador','email' => 'Admin','password' => Hash::make('12345678'),'id_rol' =>'2'],
            ['name' => 'Usuario1','email' => 'Usuario1@correo.com','password' => Hash::make('123456789'),'id_rol' =>'1'],          
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
    
};
