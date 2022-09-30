<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($historialentrada->producto->imagen)
        <img class= "imagenProd" src="/storage/{{ $historialentrada->producto->imagen }}" alt="imagen de {{$historialentrada->producto->nombre}}">
        @else
        <img class= "imagenProd" src="/images/perfil.jpg" alt="imagen de {{$historialentrada->producto->nombre}}">                                                  
    @endif

    @if($historialentrada->dañado)
        Hola muy buenas, nos permitimos informar que un stock de el producto {{$historialentrada->producto->nombre}}
        con {{$historialentrada->cantfaltante}} kg restantes, se ha dañado y ha sido retirado del inventario.
        <br>
        El producto queda con un total de {{$historialentrada->producto->cantidad}}kg 
    @else

        Hola muy buenas nos permitimos informar que un stock del producto {{$historialentrada->producto->nombre}} con 
        {{$historialentrada->cantfaltante}} kg restantes esta a 
        {{$historialentrada->dias}} dias de dañarse y ser quitado del inventario.

    @endif
</body>
</html> -->



@component('mail::message')

@if($historialentrada->dañado)
    Hola muy buenas, nos permitimos informar que un stock de el producto {{$historialentrada->producto->nombre}}
    con {{$historialentrada->cantfaltante}} kg restantes, se ha dañado y ha sido retirado del inventario.
    <br>
    El producto queda con un total de {{$historialentrada->producto->cantidad}}kg 
@else

    Hola muy buenas nos permitimos informar que un stock del producto {{$historialentrada->producto->nombre}} con 
    {{$historialentrada->cantfaltante}} kg restantes esta a 
    {{$historialentrada->dias}} dias de dañarse y ser quitado del inventario.

@endif

ATT: {{ config('app.name') }}
@endcomponent
