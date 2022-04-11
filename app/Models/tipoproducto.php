<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoproducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',    
    ];
    public function productos(){
        return $this->hasMany(Producto::class,'id_tipoproducto');
    }
    public $timestamps = false;
}
