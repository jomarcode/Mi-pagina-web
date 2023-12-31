<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = ['name' , 'slug','descripcion'];

    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }
}
