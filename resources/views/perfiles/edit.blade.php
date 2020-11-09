@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
    <h1 class="text-center">Editar Mi Perfil</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form action="">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text"
                        name="nombre"
                        class="form-control  @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Tu Nombre"
                        {{--value="{{$perfil->nombre}}"--}}
                    />
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">Sitio Web</label>
                    <input type="text"
                        name="url"
                        class="form-control  @error('url') is-invalid @enderror"
                        id="url"
                        placeholder="Tu Sitio Web"
                        {{--value="{{$perfil->url}}"--}}
                    />
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="biografia">Biografia</label>
                    <input id="biografia" type="hidden" name="biografia" {{--value="{{$perfil->preparacion}}"--}}/>
                    <trix-editor input="biografia" class="form-control @error('biografia') is-invalid @enderror"></trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="imagen">Tu Imagen</label>
                    <input id="image" name="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror">
                    @if ($perfil->imagen)
                        <div class="mt-4">
                            <p>Imagen Actual:</p>
                            {{--<img src="/storage/{{$receta->imagen}}" alt="imagen actual" style="width: 300px">--}}
                        </div>
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" defer></script>
@endsection

