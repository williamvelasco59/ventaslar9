<html>
<head>
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
  <header>
    <h1>Categorias con cantidades en stock</h1>
  </header>
  <div class="container center">
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col-3">Nombre</th>
                <th scope="col-4">Descripcion</th>
                <th scope="col">Condicion</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                        <td class="col-3">{{ $categoria->nombre }}</td>
                        <td class="col-4">{{ $categoria->descripcion }}</td>
                        <td>{{ $categoria->condicion }}</td>
                        </tr>
                    @endforeach
            </tbody>
            </table>

        </div>
    </div>
</body>
</html>