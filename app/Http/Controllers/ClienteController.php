<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }
    public function clientes(){

        $clientes = Cliente::all();
        return view('nosotros',compact('clientes'));

    }

    public function create(){

    }

    public function store(SaveClienteRequest $request)
    {
        $cliente = new Cliente();
        $cliente->slug          = Str::slug($request->get('name'));
        $cliente->name          = request('name');
        $cliente->visible       = request('visible') ? 1 : 0;
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/clientes', $file->getClientOriginalName());
                $cliente->image = $file->getClientOriginalName();
            }
        $cliente->save();
        return redirect()->back()->with('success', 'Cliente creado correctamente');
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit',compact('cliente'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->name = request('name');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/clientes', $file->getClientOriginalName());
            $cliente->image = $file->getClientOriginalName();
        }
        $cliente->update();
        return redirect()->route('clientes.index')
        ->with('success', 'Cliente actualizado correctamente');
        //
    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        unlink(public_path('img/clientes/'.$cliente->image));
        $cliente->delete();
        return redirect()->route('clientes.index')
        ->with('success', 'Cliente eliminado correctamente');
        //
    }
}
