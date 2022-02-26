<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('usuario');
            $table->string('password');
            $table->unsignedBigInteger('id_rol')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_rol')->references('id')->on('rols');
        });
        DB::table('usuario')->insert([
            ['name' => 'administrador','usuario' => 'Admin','password' => Hash::make('12345678'),'id_rol' =>'2'],           
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
