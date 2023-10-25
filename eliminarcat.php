<div class="modal fade" id="eliminarcat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                Confirmar eliminar la categoria de:
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important"> 
          <?php echo $categoria['nombre_cat']; ?>
        
          </strong>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-bs-dismiss="modal" id_categoria=" <?php echo $categoria['id_categoria']; ?>>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->