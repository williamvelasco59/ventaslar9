@extends('layouts.admin')
@section('contenido')
    <h4>Editar Articulo</h4>

    <div class="container">
    <form action="{{route('articulo.update', $articulo->idarticulo)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col-lg-4">
                <label for="codigo" class="form-label">Codigo</label>
                <input type="text" name="codigo" class="form-control" value="{{$articulo->codigo}}" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$articulo->nombre}}" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" value="{{$articulo->estado}}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-4">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{$articulo->stock}}" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$articulo->descripcion}}" required>
            </div>
            <div class="mb-3 col-lg-4">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="text" name="imagen" class="form-control" value="{{$articulo->imagen}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="idcategoria" class="form-control">
                        @foreach($categorias as $cate)
                            @if($cate->idcategoria == $articulo->idcategoria)
                                <option value="{{$cate->idcategoria}}" selected>{{ $cate->nombre }}</option>
                            @else
                                <option value="{{$cate->idcategoria}}">{{ $cate->nombre }}</option>
                            @endif
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