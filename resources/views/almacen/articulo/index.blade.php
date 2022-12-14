@extends('layouts.admin')
@section('contenido')
<br>
<div class="container">
    <div class="container">
        <a href="{{ route('articulo.create') }}" class="btn btn-success">Nuevo Articulo</a>
        <a href="generarpdfart" class="btn btn-primary">PDF</a>
        <a href="/graficobarraarti"></a>
    </div>
    <br>
    <div class="card">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">imagen</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Condicion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articulos as $art)
                <tr>
                    <td>{{ $art->codigo }}</td>
                    <td>{{ $art->nombre }}</td>
                    <td>{{ $art->stock }}</td>
                    <td>{{ $art->descripcion }}</td>
                    <td>{{ $art->imagen }}</td>
                    <td>{{ $art->estado }}</td>
                    <td>{{ $art->categoria }}</td>
                    <td>{{ $art->condicion }}</td>
                    <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$art->idarticulo}}">
                        Eliminar
                    </button>
                        | <a class="btn btn-primary" href="{{ route('articulo.edit', $art->idarticulo) }}">Editar</a></td>
                </tr>
                @include('almacen.articulo.delete')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection