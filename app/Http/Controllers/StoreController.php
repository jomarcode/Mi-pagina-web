<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $categorias =Categoria::all();
        $productos = Producto::all();
        return view('categorias',compact('productos','categorias'));
    }

    public function show($slug){

        $producto = Producto::where('slug', $slug)->first();
        return view('product-details', compact('producto'));


    }
    public function searchCategory($slug){
        $categorias = Categoria::where('slug' , $slug)->pluck('id')->all();
        $productos = Producto::where('categoria_id',$categorias)
                    ->orderBY('id', 'DESC')
                    ->simplePaginate(6);
        return view('producto', compact('categorias' , 'productos'));
    }
}
