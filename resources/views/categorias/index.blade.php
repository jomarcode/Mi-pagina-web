@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="m-0">Todos los Categorias</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Categorias</li>
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
                        <div class="box-header with-border mt-2">
                            @include('categorias.partials.modelc')
                        </div>
                        <div class="box-body mt-2">
                            <div class="table-responsive">
                                <table id="miTabla" class="table table-striped table-bordered table-hover rounded text-center">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Imagen</th>
                                            <th>Aciones</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{$categoria->id}}</td>
                                                <td>{{$categoria->name}}</td>
                                                <td>{{$categoria->descripcion}}</td>
                                                <td>
                                                    {{-- <img class="rounded-circle" src="{{asset('/img/proveedores/'.$proveedor->image)}}" alt="{{$proveedor->image}}" width="30" height="30"> --}}
                                                    <img class="rounded-circle" src="{{asset('/img/categorias/'.$categoria->image)}}" alt="{{$categoria->image}}" width="30" height="30">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center mx-2">
                                                        <div class="mx-2">
                                                            <a href="{{route('categorias.edit',$categoria->id)}}" class="btn btn-info btn-xs"><i class="far fa-edit"></i>
                                                            </a>

                                                            {{-- <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarEspecialidadModal{{ $especialidad->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button> --}}
                                                        </div>
                                                        <div>
                                                            <form id="frmDatos" action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-xs btn-eliminar">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('components.message')
                                            {{-- @include('especialidades.partials.modal') --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#miTabla').DataTable();
    });
</script>

@endsection


