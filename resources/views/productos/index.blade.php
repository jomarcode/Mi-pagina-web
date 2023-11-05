@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="m-0">Todos las Productos</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Productos</li>
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
                        <div class="box-header with-border">
                            <a href="{{ route('productos.create')}}" class="btn btn-info ">
                                <i class="fa fa-plus-circle"> Producto</i>
                            </a>
                        </div>
                        <div class="box-body mt-2">
                            <div class="table-responsive">
                                <table id="miTabla" class="table table-striped table-bordered table-hover rounded text-center">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th scope="col">Acciones</th>
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Categoría</th>
                                            <th scope="col">Sub título</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($productos as $producto)
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('productos.edit',$producto->id)}}" class="mr-2" >
                                                        <button type="button" class="btn btn-info btn-xs shadow">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </a>
                                                     
                                                    <form id="frmDatos" action="{{ route('productos.destroy', $producto->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs btn-eliminar">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <img class="rounded-circle" src="{{asset('/img/productos/'.$producto->image)}}" alt="{{$producto->image}}" width="30" height="30">
                                            </td>
                                            <td>{{$producto->name}}</td>
                                            <td>{{$producto->categoria->name}}</td>
                                            <td>{{$producto->extract}}</td>
                                            <td>{{$producto->descriptions}}</td>
                                            <td>{{ number_format( $producto->price,2)}}</td>
                                            <td>
                                                <span class="badge badge-{{ $producto->visible == 1 ? 'success' : 'danger' }}">
                                                    {{ $producto->visible == 1 ? "En Stock" : "Agotado" }}
                                                </span>
                                            </td>                                                                                     
                                        </tr>
                                        @include('components.message')
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
