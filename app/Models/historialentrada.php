<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class historialentrada extends Model
{
    use HasFactory;
    protected $fillable =[
        'fecha','cantidad',
    ];
    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public $timestamps = false;
}
