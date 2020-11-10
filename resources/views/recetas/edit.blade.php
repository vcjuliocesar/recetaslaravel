@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icono" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a>
@endsection

@section('content')
    <h2 class="text-center md-5">Editar receta:{{$receta->titulo}}</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form action="{{route('recetas.update',['receta'=>$receta->id])}}" enctype="multipart/form-data" method="POST" novalidate>
            @csrf

            @method('PUT')
                <div class="form-group">
                    <label for="titulo"> Titulo Receta</label>
                    <input type="text"
                        name="titulo"
                        class="form-control  @error('titulo') is-invalid @enderror"
                        id="titulo"
                        placeholder="Titulo Receta"
                        value="{{$receta->titulo}}"
                    />
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">-- Seleccione --</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{$receta->id == $categoria->id ? 'selected':''}}>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="preparacion">Preparacion</label>
                    <input id="preparacion" type="hidden" name="preparacion" value="{{$receta->preparacion}}"/>
                    <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{$receta->ingredientes}}"/>
                    <trix-editor input="ingredientes" class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input id="image" name="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror">
                    <div class="mt-4">
                        <p>Imagen Actual:</p>
                        <img src="/storage/{{$receta->imagen}}" alt="imagen actual" style="width: 300px">
                    </div>
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" defer></script>
@endsection
