<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::all();
        return view('ofertas.index', compact('ofertas'));
    }

    public function ofertas(){
        $ofertas = Oferta::all();
        // $productos = Producto::all();
        $proveedores = proveedor::all();

        return view('index', compact('ofertas' , 'productos','proveedores'));

    }

    public function store(Request $request)
    {
        $oferta = new Oferta();


        $oferta->name = request('titulo');
        $oferta->descripcion = request('texto');
        $oferta->slug          = Str::slug($request->get('name'));
        $oferta->visible       = request('visible') ? 1 : 0;

            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/ofertas', $file->getClientOriginalName());
                $oferta->image = $file->getClientOriginalName();
    }
        $oferta->save();
        return redirect()->back()->with('success', 'Oferta creado correctamente');
        //
    }

    public function edit($id)
    {
        $oferta = Oferta::findOrFail($id);
        return view('ofertas.edit',compact('oferta'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $oferta = Oferta::findOrFail($id);
        $oferta->name = request('titulo');
        $oferta->descripcion = request('texto');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/ofertas', $file->getClientOriginalName());
            $oferta->image = $file->getClientOriginalName();
        }
        $oferta->update();
        return redirect('ofertas');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $oferta = Oferta::findOrFail($id);
        unlink(public_path('img/ofertas/'.$oferta->image));
        $oferta->delete();
        return redirect()->route('ofertas.index')
        ->with('success', 'Oferta eliminado correctamente');

    }
}
