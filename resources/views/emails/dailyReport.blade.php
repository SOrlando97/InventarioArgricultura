@component('mail::message')

Hola muy buenas nos permitimos informal que un stock del producto {{$historialentrada->producto->nombre}} con 
{{$historialentrada->cantfaltante}} kg restantes esta a 
{{$historialentrada->dias}} dias de dañarse y ser quitado del inventario.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

ATT:
{{ config('app.name') }}
@endcomponent
