<?php

namespace App\Http\Controllers;

use App\Models\tipoproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
        if(Auth::user()->id_rol==2){
            $tipoproducto = tipoproducto::all();
            return view('tipo_producto.index', compact('tipoproducto'));
        }
        else{
            return view('inicio');
        }
        
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
    public function store(Request $request, $nombre)
    {
        /* tipoproducto()->create([
            'descripcion' => $nombre,
        ]); */
        DB::table('tipoproductos')->insert([
            'descripcion' => $nombre,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function show(tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipoproducto $tipoproducto)
    {
        $tipoproducto->delete();
    }
}
