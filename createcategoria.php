<?php
ob_start();
if ($_POST) {
    $categ = (isset($_POST['cat']) ? $_POST['cat'] : "");
    $subcateg = (isset($_POST['subcat']) ? $_POST['subcat'] : "");
    $descr = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");

    $stm = $conexion->prepare("INSERT INTO categorias(id_categoria,nombre_cat,subcategoria,descripcion)
    VALUES(null,:cat,:subcat,:descripcion)");
    $stm->bindParam(":cat", $categ);
    $stm->bindParam(":subcat", $subcateg);
    $stm->bindParam(":descripcion", $descr);
    $stm->execute();

    header("Location: agregarcategoria.php");


}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
      <link rel="stylesheet" type="text/css" href="vistas/css/estilotabla.css">
    <title>Crear</title>
</head>


<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NUEVA CATEGORIA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <label for="">Categoria:</label>
                    <input type="text" class="form-control" name="cat" value="" placeholder="Ingresa categoria" required>

                    <label for="">Subcategoria:</label>
                    <input type="text" class="form-control" name="subcat" value="" placeholder="Ingresa subcategoria" required>

                    <label for="">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value=""
                        placeholder="Ingresa descripcion">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>