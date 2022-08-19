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
    <h1 style="text-align: center">Catalogo</h1>
    <div class="container-fluid">
            <table class="table tabla1 table-hover border border-dark rounded">
                <thead>
                    <tr class="border border-secondary">
                        <th class="border border-secondary">Nombre</th>
                        <th class="border border-secondary">Imagen</th>
                        <th class="border border-secondary">QR</th>
                        <th class="border border-secondary">existencia</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($usuario->productos as $productos)   
                    <tr class="border border-secondary">
                        <td class="border border-secondary">{{$productos->nombre}} Kg</td>
                        <td class="border border-secondary">
                            @if($productos->imagen)
                            <img class= "" src="storage/{{ $productos->imagen }}" alt="imagen de {{$productos->nombre}}" width="200">
                            @else
                            <img class= "imagenProd" src="images/perfil.jpg" alt="imagen de {{$productos->nombre}}">                                                  
                            @endif
                        </td>
                        <td class="border border-secondary"><img src="storage/{{$productos->QR}}" alt="QR" width="200" height ="200"></td>
                        <td class="border border-secondary">{{$productos->cantidad}}</td>
                    </tr>
                    @endforeach                            
                </tbody>           
            </table>
            <h3>Nombre del dueño : {{$usuario->name}}</h3>
            <h3>Telefono de contacto : {{$usuario->Telefono}}</h3>
            <h3>Direccion de correo electronico : {{$usuario->email}}</h3>
        </div>
</body>
</html>


