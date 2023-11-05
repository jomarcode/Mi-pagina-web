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
                    <li class="breadcrumb-item"><a href="{{url('/proveedors.index')}}">Proveedores</a></li>
                    <li class="breadcrumb-item active">Editar</li>
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
                            <form action="{{ route('proveedors.update', $proveedore->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card  mx-auto shadow" style="width: 400px;">
                                    <div class="card-header">
                                        <label>Nombre</label>
                                        <input type="text" name="name" class="form-control" required value="{{$proveedore->name}}">
                                    </div>
                                    <div class="card-body">
                                        <label>Imagen</label>
                                        <input type="file" name="image">
                                        @if($proveedore->image != "")
                                        <img src="{{asset('/img/proveedore/'.$proveedore->image)}}" alt="{{$proveedore->name}}" class="img-fluid rounded mt-2">
                                        @endif
                                    </div>
                                    <div class="card-footer text-muted small">
                                        {{ $proveedore->updated_at }}
                                        <button type="submit" class="btn btn-success shadow">
                                            <i class="far fa-save"></i>
                                        </button>
                                        <a href="{{route('proveedors.index')}}">
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
