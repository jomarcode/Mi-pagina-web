<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view ('categorias.index',compact('categorias'));
    }

    public function store(SaveCategoriaRequest $request)
    {
        $categoria = new Categoria;
        $categoria->name = $request->input('name');
        $categoria->slug = Str::slug($request->input('name'));
        $categoria->visible       = request('visible') ? 1 : 0;
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/categorias', $file->getClientOriginalName());
            $categoria->image = $file->getClientOriginalName();
        }
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        return redirect()->back()->with('success', 'Categoria creada correctamente');
        //
    }
    public function show(Categoria $categoria)
    {
        return $categoria;
        //
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit' ,compact('categoria'));
        //
    }

    public function update(SaveCategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->name = $request->get('name');
        $categoria->descripcion = $request->get('descripcion');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/categorias', $file->getClientOriginalName());
            $categoria->image = $file->getClientOriginalName();
        }
       
        $categoria->update();

        return redirect()->route('categorias.index')
        ->with('success', 'categoria actualizado correctamente');
        //
    }
    public function destroy(Categoria $categoria)
    {
        unlink(public_path('img/categorias/'.$categoria->image));
        $categoria->delete();
        return redirect()->route('categorias.index')
            ->with('success', 'Categoria eliminada correctamente');

    }
}
