@extends('layouts.admin')
@section('contenido')
    <h4>Agregar categoria</h4>

    <div class="container">
        <form action="{{ route('categoria.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="categoria">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
        </form>
    </div>
@endsection