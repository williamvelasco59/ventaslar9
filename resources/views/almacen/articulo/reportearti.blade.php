<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<style>
    table {
        border-collapse: collapse;
    }
    
    table,
    th,
    td {
        border: 1px solid black;
    }
    
    th,
    td {
        padding: 5px;
    }
</style>
<body>
    <h4>Reporte de articulos</h4>

    <div class="container">
    <table class="table table-striped" BORDER CELLPADDING=10 CELLSPACING=0>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
            <tr>
                <td>{{ $articulo->codigo }}</td>
                <td>{{ $articulo->nombre }}</td>
                <td>{{ $articulo->stock }}</td>
                <td>{{ $articulo->descripcion }}</td>
                <td>{{ $articulo->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>

</html>