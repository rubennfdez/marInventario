<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/cargando.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/maquina.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body>
    <div class="contenido">
    <div class="container mt-5 p-5">
        <?php
        include('configbd.php');

        $sqlUbicacion = ("SELECT * FROM ubicacion ORDER BY id_ubicacion ASC ");
        $queryUbicacion = mysqli_query($con, $sqlUbicacion);
        $cantidad = mysqli_num_rows($queryUbicacion);
        ?>
        <hr>
        <div class="body">
            <div class="row text-center" style="background-color: #cecece">
                <div class="col-md-5">
                    <strong>AGREGAR NUEVA UBICACIÓN</strong>
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
                                <!--- Formulario para registrar Ubicacion --->
                                <?php include('registrarubi.php'); ?>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-md-12 p-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">UBICACIÓN</th>
                                                        <th scope="col">DESCRIPCIÓN</th>
                                                        <th scope="col">ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($dataUbicacion = mysqli_fetch_array($queryUbicacion)) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $dataUbicacion['id_ubicacion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataUbicacion['nombre_ubicacion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataUbicacion['descripcion']; ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteChildresn<?php echo $dataUbicacion['id_ubicacion']; ?>">
                                                                Eliminar
                                                            </button>

                                                            <button type="button" class="btn btn-success"
                                                                data-toggle="modal"
                                                                data-target="#editChildresn<?php echo $dataUbicacion['id_ubicacion']; ?>">
                                                                Modificar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!--Ventana Modal para Actualizar--->
                                                    <?php include("ModalEditarUbi.php"); ?>

                                                    <!--Ventana Modal para la Alerta de Eliminar--->
                                                    <?php include("ModalEliminarUbi.php"); ?>
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
                    var id_ubicacion = $(this).attr("id_ubicacion");

                    var dataString = 'id_ubicacion=' + id_ubicacion;
                    url = "recibeeliminarubi.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: dataString,
                        success: function (data) {
                            window.location.href = "ubicacion.php";
                            $('#respuesta').html(data);
                        }
                    });
                    return false;

                });


            });
        </script>

</body>
</html>