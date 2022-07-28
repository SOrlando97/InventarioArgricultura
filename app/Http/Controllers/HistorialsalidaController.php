<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\historialsalida;
use Redirect;
use PDF;

class HistorialsalidaController extends Controller
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
        /* mostrar historial de salida y formulario para crear un nuevo historial de salida */
        $historialsalida = $producto->historialsalida()->orderBy('fecha','DESC')->paginate(15);
        return view('historial.historialsalida', compact('historialsalida','producto'));
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
        $cantactual = $producto->cantidad;
        $data = $request->validate([
            'cantidad' => 'required|numeric|min:1|max:'.$cantactual,
            'precioventa' =>'required'
            ]);
            /*  guardar informacion en historial salida y modificar la cantidad de producto */
            $producto->historialsalida()->create([
                'fecha' => Carbon::now(-5)->format('Y-m-d h:i:s'),
                'cantidad' => $data['cantidad'],
                'precioventa' => $data['precioventa'],        
            ]);
            $producto->cantidad = $producto->cantidad - $data['cantidad'];
            $producto->save();
            return redirect()->route('historialsalida.index',compact('producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historialsalida  $historialsalida
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historialsalida  $historialsalida
     * @return \Illuminate\Http\Response
     */
    public function edit(historialsalida $historialsalida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historialsalida  $historialsalida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historialsalida $historialsalida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historialsalida  $historialsalida
     * @return \Illuminate\Http\Response
     */
    public function destroy(historialsalida $historialsalida)
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
        $historialsalida = $producto->historialsalida->whereBetween('fecha',[$request['fechainicio'],$request['fechafin']]);
        if(count($historialsalida) >0 ){
            view()->share('historial.ReporteHistorialsalida', ['historialsalida',$historialsalida,'request',$request]);
            $pdf = PDF::loadView('historial.ReporteHistorialsalida', ['historialsalida'=>$historialsalida,'request'=>$request]);
            return $pdf->download('Reporte-pdf.pdf');
            return view('historial.ReporteHistorialSalida', compact('historialsalida','request'));
        }
        else{
            return Redirect::back()->withErrors(['msg' => 'No existen datos entre las fechas']);
        }
    }
}
