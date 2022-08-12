<?php

namespace App\Console\Commands;
use App\Models\Producto;
use App\Models\historialentrada;
use Illuminate\Console\Command;

class VidaProducto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vida:producto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcular cuanto le queda a de vida al stock de un producto';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {      
        $historiale = historialentrada::get();      
        foreach($historiale as $he){
            if($he->dañado == false && $he->cantfaltante !=0 && $he->dias != 0){
                $he->dias = $he->dias-1;
                    if($he->dias == 0){
                        $he->dañado = true;
                        $producto = $he->producto;
                        $producto->cantidad = $producto->cantidad - $he->cantfaltante;
                        $producto->save();
                    }
                $he->save();
                if($he->dias == 30){
                    \Log::info('quedan 30 dias para que se dañe el producto');
                }elseif($he->dias == 15){
                    \Log::info('quedan 15 dias para que se dañe el producto');
                }elseif($he->dias == 10){
                    \Log::info('quedan 10 dias para que se dañe el producto');
                }
                elseif($he->dias == 5){
                    \Log::info('quedan 5 dias para que se dañe el producto');
                }
                elseif($he->dias == 0){
                    \Log::info('El producto se ha dañado y sacado del inventario');
                }
            }           
        }    
    }
}
