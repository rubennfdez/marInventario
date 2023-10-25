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

        $sqlProductos = ("SELECT * FROM productos ORDER BY id_producto ASC");
        $queryProductos = mysqli_query($con, $sqlProductos);
        $cantidad = mysqli_num_rows($queryProductos);
        ?>
        <hr>
        <div class="body">
            <div class="row text-center" style="background-color: #cecece">
               
                <div class="col-md-12">
                    <strong>REGISTROS<span style="color: crimson"> (
                            <?php echo $cantidad; ?> )
                        </span> </strong>
                </div>
            </div>
            <br>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body">
                        <div class="row clearfix">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">PRODUCTO</th>
                                                        <th scope="col">UM</th>
                                                        <th scope="col">CANTIDAD</th>
                                                        <th scope="col">CATEGORIA</th>
                                                        <th scope="col">SUBCATEGORIA</th>
                                                        <th scope="col">UBICACION</th>
                                                        <th scope="col">PROVEEDOR</th>
                                                        <th scope="col">ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($dataProductos = mysqli_fetch_array($queryProductos)) { ?>
                                                    <tr>
                                                    <td>
                                                        <?php echo $dataProductos['id_producto']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['nombre_prod']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['unidad_medida']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['cantidad']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['nombre_cat']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['subcategoria']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['nombre_ubicacion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dataProductos['nombre_prov']; ?>
                                                        </td>
                                                        <td>
                                                        <button type="button" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#deleteChildresn<?php echo $dataProveedor['id_proveedor']; ?>">
                                                                Agregar
                                                            </button>
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
                                                    <!--Ventana Modal para Agregar--->
                                                    <?php include("ModalAgregarProducto.php"); ?>

                                                    <!--Ventana Modal para Actualizar--->
                                                    <?php include("ModalEditarProducto.php"); ?>

                                                    <!--Ventana Modal para la Alerta de Eliminar--->
                                                    <?php include("ModalEliminarProducto.php"); ?>
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