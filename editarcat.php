

<!--ventana para Update--->
<div class="modal fade" id="edit<?php echo $categoria['id_categoria'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR INFORMACION</h5>
      </div>
      <form method="POST">
        <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
            <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Categoria:</label>
                  <input type="text" name="cat" class="form-control" value="<?php echo $categoria['nombre_cat']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Subcategoria</label>
                  <input type="text" name="subcat" class="form-control" value=" <?php echo $categoria['subcategoria']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Descripcion:</label>
                  <input type="text" name="descripcion" class="form-control" value=" <?php echo $categoria['descripcion']; ?>" required="true">
                </div>
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
