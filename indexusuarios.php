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

        $sqlUsuario = ("SELECT * FROM usuarios ORDER BY id_usuario ASC ");
        $queryUsuario = mysqli_query($con, $sqlUsuario);
        $cantidad = mysqli_num_rows($queryUsuario);
        ?>
        <hr>
        <div class="body">
            <div class="row text-center" style="background-color: #cecece">
                <div class="col-md-6">
                    <strong>REGISTRAR NUEVO USUARIO</strong>
                </div>
                <div class="col-md-6">
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
                                <!--- Formulario para registrar Usuario --->
                                <?php include('registrarUsuario.php'); ?>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-md-12 p-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">NOMBRE</th>
                                                        <th scope="col">CORREO</th>
                                                        <th scope="col">CONTRASEÑA</th>
                                                        <th scope="col">ROL</th>
                                                        <th scope="col">ESTATUS</th>
                                                        <th scope="col">ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($dataUsuario = mysqli_fetch_array($queryUsuario)) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $dataUsuario['nombre']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataUsuario['correo']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataUsuario['pass']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataUsuario['rol']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataUsuario['estatus']; ?>
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteChildresn<?php echo $dataUsuario['id_usuario']; ?>">
                                                                Eliminar
                                                            </button>

                                                            <button type="button" class="btn btn-success"
                                                                data-toggle="modal"
                                                                data-target="#editChildresn<?php echo $dataCat['id_categoria']; ?>">
                                                                Modificar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!--Ventana Modal para Actualizar--->
                                                    <?php include("ModalEditar.php"); ?>

                                                    <!--Ventana Modal para la Alerta de Eliminar--->
                                                    <?php include("ModalEliminar.php"); ?>
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
                    var id_categoria = $(this).attr("id_categoria");

                    var dataString = 'id_categoria=' + id_categoria;
                    url = "recibeliminar.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: dataString,
                        success: function (data) {
                            window.location.href = "agregarcategoria.php";
                            $('#respuesta').html(data);
                        }
                    });
                    return false;

                });


            });
        </script>

</body>
</html>