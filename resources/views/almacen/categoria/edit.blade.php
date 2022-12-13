@extends('layouts.admin')
@section('contenido')
    <h4>Editar categoria</h4>

    <div class="container">
        <form action="{{ route('categoria.update', $categoria->idcategoria) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="categoria">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" value="{{ $categoria->descripcion }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
        </form>
    </div>
@endsection