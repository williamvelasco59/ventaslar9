@extends('layouts.admin')
@section('contenido')

<div class="container">
    <form action="{{route('articulo.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="mb-3 col-lg-4">
                <label for="codigo" class="form-label">Codigo</label>
                <input type="text" name="codigo" class="form-control" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-4">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="text" name="imagen" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="idcategoria" class="form-control">
                        @foreach($categorias as $cate)
                            <option value="{{$cate->idcategoria}}">{{ $cate->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-success">Cancelar</button>
        <a href="javascript:history.back()">Ir al listado</a>
    </form>
</div>

@endsection