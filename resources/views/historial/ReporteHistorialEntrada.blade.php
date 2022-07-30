<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 PDF</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ public_path('css/app.css') }}"/>
</head>
<body>
    <h1 style="text-align: center">{{$producto->nombre}}</h1>
    <div class="container">
        <div class="carta-inicio card table" style="margin-top: 20px">
            <div class="card-header">
            {{ __('informe de ingreso de la fecha ') }}{{$request['fechainicio']}}
            {{ __(' a la fecha ') }}{{$request['fechafin']}}
            </div>            
                <div class="card-body">
                    <table class="table tabla1 table-hover">
                        <thead>
                            <tr>
                                <th>Cantidad añadida</th>
                                <th>Fecha</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach($historialentrada as $historialentr)   
                            <tr>
                                <td>{{$historialentr->cantidad}} Kg</td>
                                <td>{{$historialentr->fecha}}</td>
                            </tr>
                            @endforeach                            
                        </tbody>           
                    </table>
                </div>                           
        </div>
    </div>
</body>
</html>


