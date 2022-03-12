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
        Schema::create('historialsalidas', function (Blueprint $table) {
            $table->id();            
            $table->dateTime('fecha');
            $table->double('cantidad',10,2);
            $table->double('precioventa',32,2);
            $table->foreignId('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialsalidas');
    }
};
