@extends('layouts.app')

@section('title', 'Editar Productos')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="m-0">Editar Productos</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active">Editar Productos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box box-primary">
                        <div class="box-body mt-2">
                            <form action="{{ route('productos.update', $producto->id) }}" method="post" enctype="multipart/form-data" class="row shadow">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" class="form-control" value="{{ $producto->name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="extract">Sub título</label>
                                        <input type="text" name="extract" class="form-control" value="{{ $producto->extract }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="descriptions">Descripción</label>
                                        <textarea name="descriptions" class="form-control" rows="6">{{ $producto->descriptions }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Imagen</label>
                                        <input type="file" name="image" class="form-control-file">
                                        @if($producto->image != "")
                                            <img src="{{ asset('/img/productos/'.$producto->image) }}" alt="{{ $producto->image }}" class="img-fluid rounded">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="visible">Estatus:</label>
                                        <input type="checkbox" name="visible" {{ $producto->visible == 1 ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price">Precio</label>
                                        <input type="number" step="any" name="price" class="form-control" value="{{ $producto->price }}">
                                    </div>
                                </div><hr>
                                <div class="card-footer text-muted small">
                                    <span>{{ $producto->updated_at }}</span>
                                    <div>
                                        <button type="submit" class="btn btn-info shadow">
                                            <i class="far fa-save"></i> Guardar
                                        </button>
                                        <a href="{{route('productos.index') }}" class="btn btn-danger shadow ml-2">
                                            <i class="far fa-window-close"></i> Cancelar
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


