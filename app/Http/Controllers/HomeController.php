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
        // $prueba = 0 ;
        // $prodmasvendido;
        // $productos = Auth::user()->productos;
        // foreach($productos as $producto){
        //     if($producto->historialsalida->sum('cantidad') > $prueba){
        //         $prueba = $producto->historialsalida->whereBetween('fecha',[date('Y-m-01 00:00:01'),date('Y-m-d 23:59:59')])->sum('cantidad');
        //         $prodmasvendido = $producto;
        //     }            
        // }
        // dd($prodmasvendido->nombre);

        return view('home');
    }
}
