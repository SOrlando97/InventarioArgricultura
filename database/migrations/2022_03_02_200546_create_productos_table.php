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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('cantidad',10,2)->default(0);
            $table->string('QR');
            $table->double('precio',32,2);
            $table->double('ganancia',32,2);
            $table->foreignId('id_usuario')->references('id')->on('usuario');
            $table->foreignId('id_tipoproducto')->references('id')->on('tipoproductos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
