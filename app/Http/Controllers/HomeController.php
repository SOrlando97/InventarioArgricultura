<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invpromedio = 0;
        $invprompasado = 0;

        $cantmesactual = 0 ;
        $cantmesanterior = 0;

        $venta =0;

        $mrot = 0;
        $mrotanterior = 0;

        $prodmasvendidomesactual="";
        $prodmasvendidoanterior="";
        $prodmasrot="";
        $prodmasrotanterior="";
        $productos = Auth::user()->productos;

        foreach($productos as $producto){
            if($producto->historialsalida->whereBetween('fecha',[date('Y-m-01 00:00:01'),date('Y-m-d 23:59:59')])->sum('cantidad') > $cantmesactual){
                $cantmesactual = $producto->historialsalida->whereBetween('fecha',[date('Y-m-01 00:00:01'),date('Y-m-d 23:59:59')])->sum('cantidad');
                $prodmasvendidomesactual = $producto;
            }
            if($producto->historialsalida->whereBetween('fecha',[date('Y-m-01 00:00:01',strtotime("-1 month")),date('Y-m-d 23:59:59',strtotime("-1 month"))])->sum('cantidad') > $cantmesanterior){
                $cantmesanterior = $producto->historialsalida->whereBetween('fecha',[date('Y-m-01 00:00:01',strtotime("-1 month")),date('Y-m-d 23:59:59',strtotime("-1 month"))])->sum('cantidad');
                $prodmasvendidoanterior = $producto;
            }
            if ($invpromedio<$producto->historialentrada->whereBetween('fecha',[date('Y-m-1 00:00:00'),date('Y-m-d 23:59:59')])->avg('cantidad')){
                $invpromedio = $producto->historialentrada->whereBetween('fecha',[date('Y-m-1 00:00:00'),date('Y-m-d 23:59:59')])->avg('cantidad');
                $venta = $producto->historialsalida->whereBetween('fecha',[date('Y-m-1 00:00:00'),date('Y-m-d 23:59:59')])->sum('cantidad');
                $mrot = $venta/$invpromedio;
                $prodmasrot = $producto;
            }
            if ($invprompasado<$producto->historialentrada->whereBetween('fecha',[date('Y-m-1 00:00:00',strtotime("-1 month")),date('Y-m-d 23:59:59',strtotime(date('Y-m-t')."-1 month"))])->avg('cantidad')){
                $invprompasado = $producto->historialentrada->whereBetween('fecha',[date('Y-m-1 00:00:00',strtotime("-1 month")),date('Y-m-d 23:59:59',strtotime(date('Y-m-t')."-1 month"))])->avg('cantidad');
                
                $venta = $producto->historialsalida->whereBetween('fecha',[date('Y-m-1 00:00:00',strtotime("-1 month")),date('Y-m-d 23:59:59',strtotime(date('Y-m-t')."-1 month"))])->sum('cantidad');
                $mrotanterior = $venta/$invprompasado;                
                $prodmasrotanterior= $producto;
            }       
        }
        return view ('home',compact('prodmasvendidomesactual','cantmesactual','prodmasvendidoanterior','cantmesanterior','mrot','mrotanterior','prodmasrot','prodmasrotanterior'));
    }
}
