<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\historialentrada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Redirect;
use PDF;

class HistorialentradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $producto)
    {   
        $this->authorize ('view',$producto);  
        $historialentrada = $producto->historialentrada()->orderBy('fecha','DESC')->paginate(10);
        //* mostrar historial de entrada y formulario para crear un nuevo historial de entrada */
        return view('historial.historialentrada', compact('historialentrada','producto'));
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
        $this->authorize ('view',$producto); 
       /* validacion de la cantidad, es requerida, entera y debe ser un numero mayor a 1 */
        $data = $request->validate([
        'cantidad' => 'required|numeric|min:1',
        ]);
        /*  guardar informacion en historial entrada y modificar la cantidad de producto */
        $producto->historialentrada()->create([
            'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
            'cantidad' => $data['cantidad'],            
        ]);
        $producto->cantidad = $producto->cantidad+$data['cantidad'];
        $producto->save();
        return redirect()->route('historialentrada.index',compact('producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historialentrada  $historialentrada
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        
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
    public function PDF(Request $request, Producto $producto)
    {   
        $data = $request->validate([
        'fechainicio' => 'required',
        'fechafin' => 'required||after_or_equal:fechainicio||before_or_equal:today',
        ],
        [
            'fechainicio.required'=>'Esta fecha es obligatoria',
            'fechafin.after_or_equal'=>'la fecha hasta debe ser mayor a la fecha desde',
            'fechafin.required'=>'Esta fecha es obligatoria',
            'fechafin.before_or_equal'=>'Esta fecha debe ser igual o menor a la fecha actual',
        ]);
        //$this->authorize ('view',$producto);         
        $historialentrada = $producto->historialentrada->whereBetween('fecha',[$request['fechainicio'].' 00:00:00',$request['fechafin'].' 23:59:59']);
        
        if(count($historialentrada) >0 ){
            view()->share('historial.ReporteHistorialEntrada', ['historialentrada',$historialentrada,'request',$request,'producto',$producto]);
            $pdf = PDF::loadView('historial.ReporteHistorialEntrada', ['historialentrada'=>$historialentrada,'request'=>$request,'producto'=>$producto]);
            return $pdf->download('Reporte entrada '.$producto->nombre.' '.$request['fechainicio'].' a '.$request['fechafin'].'-pdf.pdf');
        }
        else{
            return Redirect::back()->withErrors(['msg' => 'No existen datos entre las fechas']);
        }
    }
}
