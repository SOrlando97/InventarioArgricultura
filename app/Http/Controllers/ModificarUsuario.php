<?php
/**controlador para controlar la cuenta del usuario logeado */
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ModificarUsuario extends Controller
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
        return view('Usuario.modusuario');  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
            'new_confirm_password' => 'required|same:new_password',
          ]);
  
          $user = Auth::user();
  
          if (!hash::check($request->current_password, $user->password)) {
            return back()->with(['msg' => 'La contraseña Actual no coincide']);

          }
          else{
            $user->password = Hash::make($request->new_password);
            $user->save();
    
            return back()->with('exitoso', 'Contraseña Cambiada Exitosamente');
          }
  
          
    }
    /**
     * Funcion storeUT(Usuario Telefono), para modificar usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUT(Request $request){
        $request->validate([
            'nombre_usuario' => 'required|string',
            'telefono' => 'nullable|string|min:7',
            'ciudad' => 'nullable|string|min:4',
        ],
        [
          'telefono.min'=>'El telefono debe ser mayor o igual a 7 digitos o vacio si lo quiere eliminar',
          'ciudad.min'=>'El nombre de la ciudad debe tener al menos 4 caracteres o puede se vacio.',
        ]);
        $user = Auth::user();
        $user->name = $request['nombre_usuario'];
        $user->telefono = $request['telefono'];
        $user->ciudad = $request['ciudad'];
        $user->save();
        return redirect()->route('modusuario');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $productos = $user->productos;
        return view('admin.produsuario',compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();
    }
}
