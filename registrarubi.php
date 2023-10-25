<style>
    form{
        padding: 10px;
        margin: 10px;
        font-size: 1.1em;
    }
</style>
<form name="form-data" action="recibUbi.php" method="POST">
    <div class="row">
      <div class="col-md-12">
      <ion-icon name="pin-outline"></ion-icon>
        <label for="categoria" class="form-label">NOMBRE:</label>
        <input type="text" class="form-control" name="nombre_ubicacion" required='true'>
      </div>
      <div class="col-md-12 mt-2">
      <ion-icon name="pricetag-outline"></ion-icon>
          <label for="subcategoria" class="form-label">DESCRIPCIÓN:</label>
          <input type="text" class="form-control" name="descripcion" required='true'>
      </div>

    </div>
      <div class="row justify-content-start text-center mt-5">
          <div class="col-12">
              <button class="btn btn-primary btn-block" id="btnEnviar" >
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
