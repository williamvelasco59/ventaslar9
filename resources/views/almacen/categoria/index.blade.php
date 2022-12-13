<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body> -->

@extends('layouts.admin')
@section('contenido')
    <div class="container">
            <a href="{{route('categoria.create')}}" class="btn btn-success">Nuevo</a>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col-3">Nombre</th>
                <th scope="col-4">Descripcion</th>
                <th scope="col">Condicion</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if(count($categorias)<=0)
                    <tr>
                        <td>no hay resultados</td>
                    </tr>

                @else
                    @foreach($categorias as $categoria)
                        <tr>
                        <td class="col-3">{{ $categoria->nombre }}</td>
                        <td class="col-4">{{ $categoria->descripcion }}</td>
                        <td>{{ $categoria->condicion }}</td>
                        <td class="col">
                            <a class="btn btn-warning btn-sm" href="{{ route('categoria.edit', $categoria->idcategoria) }}">Editar</a>
                            <form action="{{ route('categoria.destroy', $categoria->idcategoria) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="eliminar">
                            </form>
                        </td>   
                        </tr>
                    @endforeach
                @endif
            </tbody>
            </table>

            {{ $categorias->links() }}
        </div>
    </div>
    @endsection
<!-- 
    
</body>
</html> -->