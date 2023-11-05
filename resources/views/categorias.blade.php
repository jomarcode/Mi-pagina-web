@extends('layouts.web')

@section('title', 'Categorias')

@section('content')
<div class="main">
    <h1 class="title_category">Escoja una de nuestras categorías</h1>
    <hr class="style4">
    <ul class="cards">
        @foreach($categorias as $categoria)
        <li class="cards_item">
            <div class="card">
                <div class="card_image">
                    <img  class="pic-1" src="{{asset('/img/categorias/'.$categoria->image)}}" alt="{{$categoria->image}}">
                    {{-- <img  src="{{ asset('img/jldm_slider.jpg')}}" height="100"> --}}
                </div>
                <div class="card_content">
                    <h1 class="card_title">{{$categoria->name}}</h1>
                    <hr>
                    {{-- <p class="card_text">{{$categoria->descripcion}}</p> --}}
                    <a class="btn card_btn" href="{{ route('searchCategory' , $categoria->slug)}}">
                        Productos
                    </a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
{{-- <a href="#">
    <img  class="pic-1" src="{{asset('/img/productos/'.$producto->image)}}" alt="{{$producto->image}}">

</a> --}}
