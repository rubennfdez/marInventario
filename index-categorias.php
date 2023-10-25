<?php
ob_start();
include("modelos/base_marbella.php");
$stm = $conexion->prepare("SELECT * FROM categorias");
$stm->execute();
$categorias = $stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id_categoria'])) {

    $txtid = (isset($_GET['id_categoria']) ? $_GET['id_categoria'] : "");
    $stm = $conexion->prepare("DELETE  FROM categorias WHERE id_categoria=:txtid");
    $stm->bindParam(":txtid", $txtid);
    if ($stm->execute()) {
        return header("location:agregarcategoria.php");

    } else {
        return "Error:se ha generado un error al eliminar la informacion";
    }


}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vistas/css/bootstrap.css">
    <link rel="stylesheet" href="sweetAlert2/plugins/sweetAlert2/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<link rel="stylesheet" type="text/css" href="vistas/css/estilotabla.css">
<title>Agregar</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-3">
            <a class="btn btn-primary btn-lg" href="categorias.php" role="button">Regresar</a>
            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#create">
                Nuevo
            </button>

            <br>
            <br>
        </div>
    </div>

    <table class="table">

        <thead class="table table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Categoria</th>
                <th scope="col">Subcategoria</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) { ?>
                <tr class="">
                    <td scope="row">
                        <?php echo $categoria['id_categoria']; ?>
                    </td>
                    <td>
                        <?php echo $categoria['nombre_cat']; ?>
                    </td>
                    <td>
                        <?php echo $categoria['subcategoria']; ?>
                    </td>
                    <td>
                        <?php echo $categoria['descripcion']; ?>
                    </td>
                    <td>
                        <button type="button" href="eliminarcat.php?id_categoria=<?php echo $categoria['id_categoria']; ?>"
                            class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarcat">
                            Eliminar
                        </button>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $categoria['id_categoria'];?>">
                            Modificar
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <div>

        <?php include("createcategoria.php"); ?>
        <!--Ventana Modal para Actualizar--->
        <?php include("editarcat.php"); ?>

        <!--Ventana Modal para la Alerta de Eliminar--->
        <?php include("eliminarcat.php"); ?>

    </div>
    <script src="vistas/js/eliminar.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>