
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataProveedor['id_proveedor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
      <form method="POST" action="updateProv.php">
        <input type="hidden" name="id_proveedor" value="<?php echo $dataProveedor['id_proveedor']; ?>">

            <div class="modal-body" id="cont_modal">
                <div class="form-group">
                    <h2>DATOS A MODIFICAR:</h2>
                  <label for="recipient-name" class="col-form-label">NOMBRE DEL PROVEEDOR:</label>
                  <input type="text" name="nombre_prov" class="form-control" value="<?php echo $dataProveedor['nombre_prov']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">LOCALIZACIÓN:</label>
                  <input type="text" name="localizacion" class="form-control" value="<?php echo $dataProveedor['localizacion']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">TELÉFONO:</label>
                  <input type="tel" name="telefono" class="form-control" value="<?php echo $dataProveedor['telefono']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">CORREO:</label>
                  <input type="text" name="correo" class="form-control" value="<?php echo $dataProveedor['correo']; ?>" required="true">
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
