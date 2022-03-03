@extends('layouts.app')

@section('content')

<div class="div-primerboton">
    <new_tipo_prod style="width: 180px"></new_tipo_prod>
</div>

<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>descripcion tipo de producto</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            <?php
            $numero = '1';
            ?>
            @foreach($tipoproducto as $tipoproducto)      
            <tr>                
                <td>{{$numero}}</td>
                <td>{{$tipoproducto->descripcion}}</td>
                @csrf
                <td><elim_tipo_prod tipo-producto = {{$tipoproducto->id}}></elim_tipo_prod></td>
                <?php
                $numero = $numero + '1';
                ?>
            </tr>
            @endforeach
            
        </tbody>           
    </table>
</div>
@endsection