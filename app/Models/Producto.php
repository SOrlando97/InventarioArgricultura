<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    //campos que se agregan
    protected $fillable =[
        'nombre','precio','id_tipoproducto','QR','ganancia'
    ];
    public function usuario(){
        return $this->belongsTo(usuario::class , 'id_usuario');
    }
    public function tipoproducto(){
        return $this->belongsTo(tipoproducto::class , 'id_tipoproducto');
    }
    public $timestamps = false;
}
