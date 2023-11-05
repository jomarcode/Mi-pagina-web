@extends('layouts.web')

@section('title', 'Productos detalles')

@section('content')
<main class="container_product">
    <div class="left-column">
        <img data-image="red" class="active" src="{{asset('/img/productos/'.$producto->image)}}">
    </div>
    <!-- Right Column -->
    <div class="right-column">
    <!-- Product Description -->
    <div class="product-description">
        <span>{{$producto->visible == 1 ? "En Stock":"Agotado"}}</span>
        <h1>{{$producto->name}}</h1>
        <p>{{$producto->extract}}</p>
    </div>

    <!-- Product Configuration -->
    <div class="product-configuration">
        <!-- Cable Configuration -->
        <div class="cable-config">
            <span>Categoría: </span><br>
            <div class="cable-choose">
                <button>
                    <a href="{{ route('searchCategory' , $producto->categoria->slug)}}">
                        {{$producto->categoria->name}}
                    </a>
                </button>
            </div>
        </div>
    </div>

    <!-- Product Pricing -->
    <div class="product-price">
        <span>S/{{$producto->price}}</span>
            <a target="none" href="https://wa.me/51987456321?text=Hola+interesad%40+en+el+Producto%3A+{{$producto->name}}" class="cart-btn">
            Consultar
            </a>
    </div>
</main>
<div class="container">
    <div class="media">
        <img width="100" height="100"  src="{{asset('/img/productos/'.$producto->image)}}" class="align-self-start mr-3" alt="...">
        <div class="media-body">
        <h5 class="mt-0">Descripción:</h5>
        <p>{{$producto->descriptions}}</p>
        </div>
    </div>
</div>

@endsection
