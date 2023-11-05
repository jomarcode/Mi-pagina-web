@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="m-0">Todos los Proveedores</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{('ofertas.index')}}">Ofertas</a></li>
                    <li class="breadcrumb-item active">Editar ofertas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="box box-primary">
                        <div class="box-body mt-2">
                            <form action="{{ route('clientes.update', $cliente->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card  mx-auto shadow" style="width: 400px;">
                                    <div class="card-header">
                                        <label>Nombre</label>
                                        <input type="text" name="name" class="form-control" required value="{{$cliente->name}}">
                                    </div>
                                    <div class="card-body">
                                        <label>Imagen</label>
                                        <input type="file" name="image">
                                        @if($cliente->image != "")
                                        <img src="{{asset('/img/clientes/'.$cliente->image)}}" alt="{{$cliente->name}}" class="img-fluid rounded mt-2">
                                        @endif
                                    </div>
                                    <div class="card-footer text-muted small">
                                        {{ $cliente->updated_at }}
                                        <button type="submit" class="btn btn-success shadow">
                                            <i class="far fa-save"></i>
                                        </button>
                                        <a href="{{route('clientes.index')}}">
                                            <button type="button" class="btn btn-danger shadow">
                                                <i class="far fa-window-close"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
