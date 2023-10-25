<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteChildresn<?php echo $dataProveedor['id_proveedor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ELIMINAR REGISTRO
            </h4>
        </div>

        <div class="modal-body">
          <h4>PROVEEDOR:</h4>
          <strong style="text-align: center !important"> 
            <?php echo $dataProveedor['nombre_prov']; ?>
        
          </strong>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id_proveedor="<?php echo $dataProveedor['id_proveedor']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->