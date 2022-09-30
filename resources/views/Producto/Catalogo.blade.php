<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catalogo de Productos</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ public_path('css/app.css') }}"/>
    </head>
    <body>
        <h1 style="text-align: center">Catálogo</h1>
        <h3 class="fst-italic">Dueño: {{$usuario->name}}</h3>
        <h3 class="fst-italic">Teléfono: {{$usuario->Telefono}}</h3>
        <h3 class="fst-italic">Correo electrónico: {{$usuario->email}}</h3>
        <div class="container-fluid">
            <table class="table tabla1 mt-3">
                <thead>
                    <tr class="">
                        <th class="border-top border-end border-bottom">Producto</th>
                        <th class="border-top border-end border-bottom">Imagen</th>
                        <th class="border-top border-bottom">Código QR</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($usuario->productos as $productos)   
                    <tr class="border border-light">
                        <td>{{ ucfirst($productos->nombre)}}
                            <br>
                            Cantidad: {{$productos->cantidad}} Kg
                        </td>
                        <td>
                            @if($productos->imagen)
                            <img class="img-catalogo" src="storage/{{ $productos->imagen }}" alt="imagen de {{$productos->nombre}}" >
                            @else
                            <img class= "img-catalogo" src="images/perfil.jpg" alt="imagen de {{$productos->nombre}}">                                                  
                            @endif
                        </td>
                        <td class=""><img class="imagenQR-catalogo" src="storage/{{$productos->QR}}" alt="QR" ></td>
                    </tr>
                    @endforeach                            
                </tbody>           
            </table>
        </div>
    </body>
</html>


