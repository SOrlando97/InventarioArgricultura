<?php

namespace App\Console\Commands;
use App\Models\Producto;
use App\Models\historialentrada;
use App\Mail\EmailVidaProducto;
use Illuminate\Console\Command;
use Mail;

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
                if($he->dias == 30 || $he->dias == 15 || $he->dias == 10 || $he->dias == 5|| $he->dias == 0){
                    Mail::to($he->producto->usuario->email)->send(new EmailVidaProducto($he));
                }
            }           
        }    
    }
}
