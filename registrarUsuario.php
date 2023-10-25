<style>
    form {
        padding: 10px;
        margin: 10px;
        font-size: 1.1em;
    }
</style>
<form name="form-data" action="recibUser.php" method="POST">
    <div class="row">
        <div class="col-md-12">
            <ion-icon name="person-add-outline"></ion-icon>
            <label for="nombre" class="form-label">NOMBRE:</label>
            <input type="text" class="form-control" name="nombre" required='true'>
        </div>
        <div class="col-md-12 mt-2">
            <ion-icon name="mail-outline"></ion-icon>
            <label for="correo" class="form-label">CORREO:</label>
            <input type="email" class="form-control" name="correo" required='true'>
        </div>
        <div class="col-md-12 mt-2">
            <ion-icon name="key-outline"></ion-icon>
            <label for="localizacion" class="form-label">CONTRASEÑA:</label>
            <input type="text" class="form-control" name="pass" required='true'>
        </div>
        <div class="col-md-12 mt-2">
        <ion-icon name="people-outline"></ion-icon>
            <label for="text" class="form-label">ROL:</label>
            <select class="form-control" name="rol" id="">
            <option selected>Seleccionar...</option>
                <option>Administrador</option>
                <option>Empleado</option>
            </select>
        </div>
        <div class="col-md-12 mt-2">
        <ion-icon name="stats-chart-outline"></ion-icon>
            <label for="text" class="form-label">ESTATUS:</label>
            <select class="form-control" name="estatus" id="">
            <option selected>Seleccionar...</option>
                <option>Vigente</option>
                <option>Vencido</option>
            </select>
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