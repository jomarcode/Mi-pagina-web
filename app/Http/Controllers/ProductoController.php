<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoUpdateRequest;
use App\Http\Requests\SaveProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $productos = Producto::where('name','LIKE','%'. $query.'%')
            ->orderBy('id','asc')
            ->simplePaginate(5);
            return view('productos.index',['productos' => $productos , 'search' => $query]);
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create',compact('categorias'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProductoRequest $request)
    {
        $producto = new Producto();

        $producto->categoria_id  = $request->get('categoria_id');
        $producto->name          = request('name');
        $producto->slug          = Str::slug($request->get('name'));
        $producto->descriptions  = request('descriptions');
        $producto->extract       = request('extract');
        $producto->price         = request('price');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
                $producto->image = $file->getClientOriginalName();
        $producto->visible       = request('visible') ? 1 : 0;
    }
        $producto->save();
        return redirect()->route('productos.index')
        ->with('success', 'producto creado correctamente');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit',compact('producto'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoUpdateRequest $request,$id)
    {
        $producto = Producto::findOrFail($id);

        $producto->categoria_id  = $request->get('categoria_id');
        $producto->name          = $request->get('name');
        $producto->slug          = Str::slug($request->get('name'));
        $producto->descriptions  = $request->get('descriptions');
        $producto->extract       = $request->get('extract');
        $producto->price         = $request->get('price');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
                $producto->image = $file->getClientOriginalName();
            }
        $producto->visible       = $request->get('visible') ? 1 : 0;
        $producto->update();
        return redirect('productos.indes');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        unlink(public_path('img/productos/'.$producto->image));
        $producto->delete();
        return redirect('productos/');
        //
    }
}
