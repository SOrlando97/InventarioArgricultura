<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de egreso de {{$producto->nombre}}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ public_path('css/app.css') }}"/>
</head>
<body>
    <h1 style="text-align: center">{{$producto->nombre}}</h1>
    <p>
        El presente documento es un informe de egreso del producto: {{$producto->nombre}}, el cual ha 
        sido generado por el sistema de inventario el día: <?php echo  date('m-d-Y h:i:s a', time()); ?>.
    </p>
    <p>
        A continuación encontrará la información recolectada desde {{$request['fechainicio']}} hasta {{$request['fechafin']}}.
    </p>
        <div class="container-fluid">
            <table class="table tabla1 table-hover border border-dark rounded">
                <thead>
                    <tr class="border border-secondary">
                        <th class="border border-secondary">Cantidad añadida</th>
                        <th class="border border-secondary">Precio venta</th>
                        <th class="border border-secondary">Fecha</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($historialsalida as $historialsal)   
                        <tr class="border border-secondary">
                            <td class="border border-secondary">{{$historialsal->cantidad}} Kg</td>
                            <td class="border border-secondary">
                                <?php echo $venta= number_format($historialsal->precioventa); ?>
                            </td>
                            <td class="border border-secondary">{{$historialsal->fecha}}</td>
                        </tr>
                    @endforeach                       
                </tbody>           
            </table>
            <div class="row">
                <div class="col-6">
                    <div class="alert alert-success" role="alert">
                        <strong>Recaudado total $ <?php echo $value= number_format($recaudado); ?> </strong>
                    </div>
                </div>
                <div class="col-6">
                    <div class="alert alert-success" role="alert">
                        <strong>Existencia actual: {{$producto->cantidad}} kg de {{$producto->nombre}}</strong>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>