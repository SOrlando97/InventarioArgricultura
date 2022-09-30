<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de ingreso de {{$producto->nombre}}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ public_path('css/app.css') }}"/>
</head>
<body>
    <h1 style="text-align: center">{{ ucfirst($producto->nombre)}}</h1>
    <p>
        El presente documento es un informe de ingreso del producto: {{ucfirst($producto->nombre)}}, el cual ha 
        sido generado por el sistema de inventario el día: <?php echo  date('m-d-Y h:i:s a', time()); ?>.
    </p>
    <p>
        A continuación encontrará la información recolectada desde {{$request['fechainicio']}} hasta {{$request['fechafin']}}.
    </p>
    <div class="container-fluid">
            <table class="table tabla1">
                <thead>
                    <tr class="">
                        <th class="border-top border-end border-bottom">Cantidad añadida</th>
                        <th class="border-top border-end border-bottom">Fecha</th>
                        <th class="border-top border-end border-bottom">Días para dañarse</th>
                        <th class="border-top border-bottom">Dañado</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($historialentrada as $historialentr)   
                    <tr class="border border-light">
                        <td class="">{{$historialentr->cantidad}} Kg</td>
                        <td class="">{{$historialentr->fecha}}</td>
                        <td class="">{{$historialentr->dias}}</td>
                        @if($historialentr->dañado)
                            <td class="">Si</td>
                        @else
                            <td class="">No</td>
                        @endif
                    </tr>
                    @endforeach                            
                </tbody>           
            </table>
            <div class="alert alert-success" role="alert">
                <div class="text-center">
                    <strong> Total añadido: {{$historialentrada->sum('cantidad')}} kg</strong>
                </div>
            </div>
        </div>
</body>
</html>


