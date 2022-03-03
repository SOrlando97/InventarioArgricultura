<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('tipoproductos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
        });

        DB::table('tipoproductos')->insert([
            ['id' => '1','descripcion' => 'Hortalizas'],
            ['id' => '2','descripcion' => 'Leguminosas'], 
            ['id' => '3','descripcion' => 'Cereales'], 
            ['id' => '4','descripcion' => 'Frutas'], 
            ['id' => '5','descripcion' => 'Tubérculos'],          
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoproductos');
    }
};
