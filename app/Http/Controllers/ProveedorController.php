<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProveedorRequest;
use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = proveedor::all();
        return view('proveedors.index', compact('proveedores'));
    }
    public function create(){

    }

    public function store(SaveProveedorRequest $request)
    {
        $proveedore = new Proveedor();
        $proveedore->slug          = Str::slug($request->get('name'));
        $proveedore->name          = request('name');
        $proveedore->visible       = request('visible') ? 1 : 0;
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/proveedore', $file->getClientOriginalName());
                $proveedore->image = $file->getClientOriginalName();
            }
        $proveedore->save();
        return redirect()->back()->with('success', 'Proveedor creado correctamente');
        //
    }

    public function edit($id)
    {
        $proveedore = Proveedor::findOrFail($id);
        return view('proveedors.edit',compact('proveedore'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $proveedore = Proveedor::findOrFail($id);
        $proveedore->name = request('name');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/proveedore', $file->getClientOriginalName());
            $proveedore->image = $file->getClientOriginalName();
        }
        $proveedore->update();
        return redirect()->route('proveedors.index')
        ->with('success', 'medico actualizado correctamente');
        //
    }
    public function destroy($id)
    {
        $proveedore = Proveedor::findOrFail($id);
        unlink(public_path('img/proveedore/'.$proveedore->image));
        $proveedore->delete();
        return redirect()->route('proveedors.index')
        ->with('success', 'medico eliminada correctamente');
        //
    }

}
