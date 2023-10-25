<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteChildresn<?php echo $dataUbicacion['id_ubicacion']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ELIMINAR REGISTRO
            </h4>
        </div>

        <div class="modal-body">
          <h4>UBICACIÓN:</h4>
          <strong style="text-align: center !important"> 
            <?php echo $dataUbicacion['nombre_ubicacion']; ?>
        
          </strong>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id_ubicacion="<?php echo $dataUbicacion['id_ubicacion']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->