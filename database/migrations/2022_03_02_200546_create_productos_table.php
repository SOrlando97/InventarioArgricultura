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
            $table->string('QR')->default('');
            $table->double('precio',32,2);
            $table->double('ganancia',32,2);
            $table->foreignId('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreignId('id_tipoproducto')->references('id')->on('tipoproductos')->onDelete('cascade');
        });
        DB::table('productos')->insert([
            ['nombre' => 'Papas','cantidad'=> 8.2,'precio' => 15000,'ganancia' => 20250,'id_tipoproducto' =>'5','id_usuario' =>'2'],
            ['nombre' => 'Yuca','cantidad'=> 0,'precio' => 8000,'ganancia' => 8000*1.35,'id_tipoproducto' =>'5','id_usuario' =>'2'],         
        ]);
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
