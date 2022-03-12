<?php

namespace App\Models;

use App\Models\historialsalida;
use App\Models\historialentrada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;
    //campos que se agregan
    protected $fillable =[
        'nombre','precio','id_tipoproducto','QR','ganancia',
    ];
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function tipoproducto(){
        return $this->belongsTo(tipoproducto::class , 'id_tipoproducto');
    }
    public function historialentrada(){
        return $this->hasMany(historialentrada::class, 'id_producto');
    }
    public function historialsalida(){
        return $this->hasMany(historialsalida::class , 'id_producto');
    }
    public $timestamps = false;
}
