<?php

use Carbon\Carbon;
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
        Schema::create('historialentradas', function (Blueprint $table) {
            $table->id();            
            $table->dateTime('fecha');
            $table->double('cantidad',10,2);
            $table->foreignId('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
        DB::table('historialentradas')->insert([
            ['fecha' => Carbon::now(-5),'cantidad'=> 3,'id_producto' => 1],
            ['fecha' => Carbon::now(-5),'cantidad'=> 5.2,'id_producto' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialentradas');
    }
};
