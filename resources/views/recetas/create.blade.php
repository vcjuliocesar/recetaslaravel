@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
    <h2 class="text-center md-5">Crear nueva receta</h2>

@endsection
