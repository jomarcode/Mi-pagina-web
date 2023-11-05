@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h5 class="m-0">Bienvenido</h5>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Tienes el Control</li>
            </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="info-box shadow-lg">
            <span class="info-box-icon bg-primary"><a href="{{url('proveedores')}}" ><i class="fas fa-users"></i></a></span>
            <div class="info-box-content">
              <span class="info-box-text">Proveedores</span>
              <span class="info-box-number">{{$proveedoreCount}}</span>
            </div>
            <div class="ribbon-wrapper">
                <div class="ribbon bg-primary">
                    <a href="{{url('proveedors')}}" >+ Info</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="info-box shadow-lg">
            <span class="info-box-icon bg-info"><a href="{{url('clientes')}}"><i class="fas fa-address-book"></i></a></span>
            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
              <span class="info-box-number">{{$clienteCount}}</span>
            </div>
            <div class="ribbon-wrapper">
                <div class="ribbon bg-info">
                    <a href="{{url('clientes')}}">+ Info</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 ">
        <div class="info-box shadow-lg">
            <span class="info-box-icon bg-warning"><a href="{{url('usuarios')}}"><i class="fas fa-user-plus"></i></a></span>
            <div class="info-box-content">
              <span class="info-box-text">Usuarios</span>
              <span class="info-box-number">{{$userCount}}</span>
            </div>
            <div class="ribbon-wrapper">
                <div class="ribbon bg-warning">
                    <a href="{{url('users')}}">+ Info</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 ">
        <div class="info-box shadow-lg">
            <span class="info-box-icon bg-warning"><a href="{{url('categorias')}}"><i class="fas fa-th-large"></i></a></span>
            <div class="info-box-content">
              <span class="info-box-text">Categorias</span>
              <span class="info-box-number">{{$categoriaCount}}</span>
            </div>
            <div class="ribbon-wrapper">
                <div class="ribbon bg-warning">
                    <a href="{{url('categorias')}}">+ Info</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="info-box shadow-lg">
            <span class="info-box-icon bg-success"><a href="{{url('ofertas')}}"><i class="far fa-bookmark"></i></a></span>
            <div class="info-box-content">
                <span class="info-box-text">Ofertas</span>
                <span class="info-box-number" id="especialidadesCount">{{ $ofertasCount }}</span>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: {{ $ofertasCount }}%"></div>
                </div>
                <span class="progress-description">
                    {{ $ofertasCount }} Ofertas 
                </span>
            </div>
            <div class="ribbon-wrapper">
                <div class="ribbon bg-success">
                    <a href="{{url('ofertas')}}"> + Info</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="info-box shadow-lg">
            <span class="info-box-icon bg-success"><a href="{{url('productos')}}"><i class="fas fa-shopping-bag"></i></a></span>
            <div class="info-box-content">
                <span class="info-box-text">Productos</span>
                <span class="info-box-number" id="especialidadesCount">{{ $productosCount }}</span>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: {{ $productosCount }}%"></div>
                </div>
                <span class="progress-description">
                    {{ $productosCount }} Productos
                </span>
            </div>
            <div class="ribbon-wrapper">
                <div class="ribbon bg-success">
                    <a href="{{url('productos')}}"> + Info</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
