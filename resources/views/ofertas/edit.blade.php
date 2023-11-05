@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="m-0">Todos los Ofertas</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/ofertas.index')}}">Ofertas</a></li>
                    <li class="breadcrumb-item active">Editar Ofertas</li>
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
                        <div class="box-body">
                            <form action="{{ route('ofertas.update', $oferta->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card shadow-lg mx-auto" style="width: 400px;">
                                    <div class="card-header">
                                        <label>name</label>
                                        <input type="text" name="titulo" class="form-control" required value="{{ $oferta->name }}">
                                    </div>
                                    <div class="card-body">
                                        <label>Descrpcion</label>
                                        <textarea name="texto" id="" class="form-control" required rows="6">{{ $oferta->descripcion }}</textarea>

                                        <label>Imagen</label>
                                        <br>
                                        <input type="file" name="image">
                                        @if($oferta->image != "")
                                            <img src="{{asset('/img/ofertas/'.$oferta->image)}}" alt="{{$oferta->name}}" height="300px" width="50px" class="card-img-top">
                                        @endif
                                    </div>

                                    <div class="card-footer text-muted small">
                                        {{ $oferta->updated_at }}
                                        <button type="submit" class="btn btn-info">
                                            <i class="far fa-save"></i>
                                        </button>
                                        <a href="{{route('ofertas.index')}}">
                                            <button type="button" class="btn btn-danger">
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
