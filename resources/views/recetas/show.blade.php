@extends('layouts.app')

@section('content')
<h1>{{$receta}}</h1>
<article class="contenido-receta">
   <h1 class="text-center mb-4">{{$receta->titulo}}</h1>
   <div class="imagen-receta">
   <img src="/storage/{{$receta->imagen}}" alt="imagen" class="w-100">
   </div>
   <div class="receta-meta mt-2">
       <p>
           <span class="font-weight-bold text-primary">Escrito en:</span>
           {{$receta->categoria->nombre}}
       </p>
       <p>
           <span class="font-weight-bold text-primary">Autor:</span>
           {{$receta->user_id}}
       </p>
       <p>
        <span class="font-weight-bold text-primary">Fecha:</span>
        {{$receta->created_at}}
        </p>
       <div class="ingredientes">
           <h2 class="my-3 text-primary">Ingredientes</h2>
           {!! $receta->ingredientes!!}
       </div>

       <div class="preparacion">
        <h2 class="my-3 text-primary">Preparacion</h2>
        {!! $receta->preparacion!!}
    </div>
   </div>
</article>
@endsection
