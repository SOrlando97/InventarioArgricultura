<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\historialentrada;
use Illuminate\Support\Facades\Auth;

class HistorialentradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Producto $producto)
    {
       /* validacion de la cantidad, es requerida, entera y debe ser un numero mayor a 1 */
        $data = $request->validate([
        'cantidad' => 'required|numeric|min:1',
        ]);
        /*  guardar informacion en historial entrada y modificar la cantidad de producto */
        $producto->historialentrada()->create([
            'fecha' => Carbon::now(-5)->format('Y-m-d h:i:s'),
            'cantidad' => $data['cantidad'],            
        ]);
        $producto->cantidad = $producto->cantidad + $data['cantidad'];
        $producto->save();
        return redirect()->route('historialentrada.show',compact('producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historialentrada  $historialentrada
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        /* mostrar historial de entrada y formulario para crear un nuevo historial de entrada */
        $historialentrada = $producto->historialentrada;
        return view('historial.historialentrada', compact('historialentrada','producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historialentrada  $historialentrada
     * @return \Illuminate\Http\Response
     */
    public function edit(historialentrada $historialentrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historialentrada  $historialentrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historialentrada $historialentrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historialentrada  $historialentrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(historialentrada $historialentrada)
    {
        //
    }
}
