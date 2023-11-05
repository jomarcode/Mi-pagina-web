<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Oferta;
use App\Models\Producto;
use App\Models\proveedor;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productosCount = Producto::count();
        $categoriaCount = Categoria::count();
        $ofertasCount = Oferta::count();
        $clienteCount = Cliente::count();
        $proveedoreCount = proveedor::count();
        $userCount =User::count();
        return view('home' ,compact('userCount','proveedoreCount','clienteCount','ofertasCount','categoriaCount','productosCount'));
    }
}
