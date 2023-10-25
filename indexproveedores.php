<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/cargando.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/maquina.css">


</head>

<body>
    <div class="contenido">
    <div class="container mt-5 p-5">
        <?php
        include('configbd.php');

        $sqlProveedor = ("SELECT * FROM proveedores ORDER BY id_proveedor DESC ");
        $queryProveedor = mysqli_query($con, $sqlProveedor);
        $cantidad = mysqli_num_rows($queryProveedor);
        ?>
        <hr>
        <div class="body">
            <div class="row text-center" style="background-color: #cecece">
                <div class="col-md-5">
                    <strong>AGREGAR NUEVO PROVEEDOR</strong>
                </div>
                <div class="col-md-7">
                    <strong>REGISTROS<span style="color: crimson"> (
                            <?php echo $cantidad; ?> )
                        </span> </strong>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-5">
                                <!--- Formulario para registrar Cliente --->
                                <?php include('registrarprov.php'); ?>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-md-12 p-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">NOMBRE</th>
                                                        <th scope="col">LOCALIZACIÓN</th>
                                                        <th scope="col">TELÉFONO</th>
                                                        <th scope="col">CORREO</th>
                                                        <th scope="col">ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($dataProveedor = mysqli_fetch_array($queryProveedor)) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $dataProveedor['nombre_prov']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProveedor['localizacion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProveedor['telefono']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProveedor['correo']; ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteChildresn<?php echo $dataProveedor['id_proveedor']; ?>">
                                                                Eliminar
                                                            </button>

                                                            <button type="button" class="btn btn-success"
                                                                data-toggle="modal"
                                                                data-target="#editChildresn<?php echo $dataProveedor['id_proveedor']; ?>">
                                                                Modificar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!--Ventana Modal para Actualizar--->
                                                    <?php include("ModalEditarProv.php"); ?>

                                                    <!--Ventana Modal para la Alerta de Eliminar--->
                                                    <?php include("ModalEliminarProv.php"); ?>
                                                    <?php } ?>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                //Ocultar mensaje
                setTimeout(function () {
                    $("#contenMsjs").fadeOut(1000);
                }, 3000);

                $('.btnBorrar').click(function (e) {
                    e.preventDefault();
                    var id_proveedor = $(this).attr("id_proveedor");

                    var dataString = 'id_proveedor=' + id_proveedor;
                    url = "recibeeliminarprov.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: dataString,
                        success: function (data) {
                            window.location.href = "proveedores.php";
                            $('#respuesta').html(data);
                        }
                    });
                    return false;

                });


            });
        </script>

</body>
</html>