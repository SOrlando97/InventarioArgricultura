<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\tipoproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Request as res;

class ProductoController extends Controller
{    
    /**
     * funcion constructor
     * revisa el middleware (si el usuario que intenta acceder a este
     * controller esta autenticado o no), se hace excepcion para la vista show (mostrar producto especifico)
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // @param productos son los productos que tiene el usuario autenticado
        $productos = Auth::user()->productos()->paginate(5);
        // se muestra vista de productos con los productos que petenecen al usuario autenticado
        return view('Producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // param tipoproducto recibe todos los tipos de producto existentes
        $tipoproducto = tipoproducto::all();
        // se muestra vista para crear producto, enviandole los tipos de producto
        return view('Producto.create', compact('tipoproducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de datos de los productos, para que estos sean requeridos en el formulario
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'tipoproducto' => 'required',
        ]);
        // insercion con sentencia SQL
        /* DB::table('productos')->insert([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'id_tipoproducto' => $data['tipoproducto'],
            'QR' => '1',
            'ganancia' => '1',
            'id_usuario' => Auth::user()->id,
        ]); */
        // @param id, recibe el id autoincremental con el que se genero el producto.
        // insercion de datos usando el modelo de laravel (proteje los datos al hacer la insercion)
        $id = Auth::user()->productos()->create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'id_tipoproducto' => $data['tipoproducto'],
            'QR' => '1',
            'ganancia' => ($data['precio'] * 1.35),
        ])->id;
        //se envia el id con el que se genero el producto a la funcion para generar codigo QR
        return $this->QRgenerate($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {        
        //devuelve vista para ver un producto especifico, se envia un arreglo con todos los datos del producto
        return view('Producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //revisar Policy
        $this->authorize ('update',$producto);
        // @param tipoproducto es igual a un arreglo de todos los tipos de productos existentes
        $tipoproducto = tipoproducto::all();
        // devuelve vista para editar el producto, enviandole los tipos de producto para que estos puedan ser visualizados
        return view('Producto.edit', compact('producto','tipoproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //revisar Policy
        $this->authorize ('update',$producto);

        /**validate, valida si la informacion proveniente del formulario de la vista edit
         *el nombre es requerido, el precio es requerido, tipo de producto es requerido (no se pueden dejar en blanco) 
         */
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'tipoproducto' => 'required',
        ]);
        
        //se añaden los datos provenientes del formulario al modelo de producto      
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];
        $producto->id_tipoproducto = $data['tipoproducto'];
        //se guardan los cambios en la BD
        $producto->save();
        //se redirecciona a la vista de producto, donde se ven los productos que tiene el usuario
        return redirect()->route('Producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {   
        //politica para borrar, solo si el usuario es propietario del producto, o si es un administrador
        $this->authorize ('delete',$producto);
        // se busca el codigo QR relacionado al producto 
        $filename = 'public/qrcodes/'.$producto->id.'.svg';
        // se elimina el codigo QR del servidor
        Storage::delete($filename); 
        // se elimina el producto de la BD
        $producto->delete();        
    }
    /**
     * Crear codigo QR de un producto
     *
     * @param int id, identificador de un producto
     * @return \Illuminate\Http\Response
     */
    public function QRgenerate(int $id){
        // @param url parametro que toma la direccion del producto
        $url = res::URL('Producto.show').'/'.$id;
        // @param imgurl direccion donde se guardara el codigo QR
        $imgurl = '../storage/app/public/qrcodes/'.$id.'.png';
        /**
         *  funcion que crea un codigo QR de tamañño 800 con 2 de margen, recibe la direccion url
         * de la cual se generara el codigo QR, y la direccion imgurl donde se guardara una vez generado
         **/ 
        QrCode::format('png')->size(800)->margin(2)->generate($url,$imgurl);
        // se busca el producto por el id
        $producto = Auth::user()->productos()->find($id);
        // se remplaza el valor de imgurl por la url que se añadira al producto, URL solo para visualizacion
        $imgurl = '../storage/qrcodes/'.$id.'.png';
        // se agrega el url del QR al modelo del producto
        $producto->QR = $imgurl;
        // se guarda los cambios en la BD
        $producto->save();
        // se redirecciona a la vista de productos de un usuario
        return redirect()->route('Producto.index');
    }
}
