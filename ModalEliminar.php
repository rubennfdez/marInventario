<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteChildresn<?php echo $dataCat['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ELIMINAR REGISTRO
            </h4>
        </div>

        <div class="modal-body">
          <h4>CATEGORIA:</h4>
          <strong style="text-align: center !important"> 
            <?php echo $dataCat['nombre_cat']; ?>
        
          </strong>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id_categoria="<?php echo $dataCat['id_categoria']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->