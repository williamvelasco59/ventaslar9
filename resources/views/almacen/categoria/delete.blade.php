

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$categoria->idcategoria}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <form action="{{ route('categoria.destroy', $categoria->idcategoria) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar categoria</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Desea eliminar la categoria {{$categoria->nombre. " " .$categoria->descripcion}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
            <input type="submit" class="btn btn-danger btn-sm" value="eliminar">
          </div>
        </div>
    </form>

  </div>
</div>