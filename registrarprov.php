<style>
    form{
        padding: 10px;
        margin: 10px;
        font-size: 1.1em;
    }
</style>
<form name="form-data" action="recibProv.php" method="POST">
    <div class="row">
      <div class="col-md-12">
      <ion-icon name="person-add-outline"></ion-icon>
        <label for="nombre" class="form-label">NOMBRE:</label>
        <input type="text" class="form-control" name="nombre_prov" required='true'>
      </div>
      <div class="col-md-12 mt-2">
      <ion-icon name="navigate-circle-outline"></ion-icon>
          <label for="localizacion" class="form-label">LOCALIZACIÓN:</label>
          <input type="text" class="form-control" name="localizacion" required='true'>
      </div>
      <div class="col-md-12 mt-2">
      <ion-icon name="call-outline"></ion-icon>
          <label for="telefono" class="form-label">TELÉFONO:</label>
          <input type="tel" class="form-control" name="telefono" required='true'>
      </div>
      <div class="col-md-12 mt-2">
      <ion-icon name="mail-outline"></ion-icon>
          <label for="correo" class="form-label">CORREO:</label>
          <input type="email" class="form-control" name="correo" required='true'>
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