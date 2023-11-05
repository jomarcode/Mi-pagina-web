@extends('layouts.app')
@section('content')
<div class="container ">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0">Crear Productos</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Crear Productos</li>
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
                                <div class="page">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="categoria_id">CATEGORÍAS</label>
                                        <select name="categoria_id" class="form-control" placeholder="Elija una categoria de producto">
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control" required placeholder="Ingrese su Nombre">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="extract">Sub título</label>
                                            <input type="text" name="extract" class="form-control" required placeholder="Ingrese su Sub título">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptions">Descripción:</label>
                                        <textarea name="descriptions" class="form-control" required maxlength="400"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="price">Precio</label>
                                            <input type="number" step="any" name="price" class="form-control" required placeholder="Ingrese precio">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Imagen:</label>
                                            <input type="file" name="image" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="visible">Estatus:</label>
                                        <input type="checkbox" name="visible" class="form-check-label">
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary shadow">Guardar</button>
                                        <a href="{{ route('productos.index') }}" class="btn btn-danger shadow">ATRAS</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
