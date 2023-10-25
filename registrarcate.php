<style>
    form{
        padding: 10px;
        margin: 10px;
        font-size: 1.1em;
    }
</style>
<form name="form-data" action="recibCat.php" method="POST">
    <div class="row">
      <div class="col-md-12">
      <ion-icon name="fish-outline"></ion-icon>
          <label for="categoria" class="form-label">CATEGORÍA:</label>
          <input type="text" class="form-control" name="nombre_cat" required='true' autofocus>
      </div>
      <div class="col-md-12 mt-2">
      <ion-icon name="play-circle-outline"></ion-icon>
          <label for="subcategoria" class="form-label">SUBCATEGORÍA:</label>
          <input type="text" class="form-control" name="subcategoria" required='true'>
      </div>
      <div class="col-md-12 mt-2">
      <ion-icon name="document-text-outline"></ion-icon>
          <label for="descripcion" class="form-label">DESCRIPCIÓN:</label>
          <input type="text" class="form-control" name="descripcion" required='true'>
      </div>

    </div>
      <div class="row justify-content-start text-center mt-5">
          <div class="col-12">
              <button class="btn btn-primary btn-block" id="btnEnviar">
                  Registrar
              </button>
          </div>
      </div>
</form>
<style>
    .btn-primary {
        align-items: center;
        align-content: center;
        font-size: 1.1em;
    }
</style>