
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataUbicacion['id_ubicacion']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #494b5a !important;">
        <h6 class="modal-title" style="color: #ffff; text-align: center;">
           ACTUALIZAR INFORMACIÓN 
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="updateUbi.php">
        <input type="hidden" name="id_ubicacion" value="<?php echo $dataUbicacion['id_ubicacion']; ?>">

            <div class="modal-body" id="cont_modal">
                <div class="form-group">
                    <h2>DATOS A MODIFICAR:</h2>
                  <label for="recipient-name" class="col-form-label">UBICACIÓN:</label>
                  <input type="text" name="nombre_ubicacion" class="form-control" value="<?php echo $dataUbicacion['nombre_ubicacion']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DESCRIPCIÓN:</label>
                  <input type="text" name="descripcion" class="form-control" value="<?php echo $dataUbicacion['descripcion']; ?>" required="true">
                </div>
              
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
