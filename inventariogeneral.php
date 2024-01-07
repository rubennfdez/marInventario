<?php
/*Conexión para cargar datos al modal*/
require 'configbd2.php';

/* Incluir el elimina.php para el botón de eliminar registro */
include "eliminaBIG.php";

/* Mostrar los datos de la BD a la tabla de inventario - bodega*/
$sql_InventarioBodega = "SELECT ib.idbodega_inventario, 
                             ct.nombre_cat AS categoria,   -- Alias de la columna nombre_cat en la tabla categorias
                             prod.nombre_prod AS producto, -- Alias de la columna nombre_prod en la tabla productos
                             um.uni_med AS unidad_medida,  -- Alias de la columna uni_med en la tabla unidad_medida
                             ib.entrada_bodega, ib.e_lunes, ib.s_lunes, ib.e_martes, ib.s_martes, 
                             ib.e_miercoles, ib.s_miercoles, ib.e_jueves, ib.s_jueves, ib.e_viernes, ib.s_viernes,
                             ib.e_sabado, ib.s_sabado, ib.e_domingo, ib.s_domingo, ib.total, ib.actual,
                             DATE_FORMAT(ib.fecha, '%Y-%m-%d a las %H:%i:%s') AS fecha
                      FROM inventario_bodega AS ib
                      INNER JOIN categorias AS ct ON ib.idcategoria_bodega = ct.id_categoria
                      INNER JOIN productos AS prod ON ib.idproducto_bodega = prod.id_producto
                      INNER JOIN unidad_medida AS um ON ib.idum_bodega = um.id_medida";

$inventario_bodega_result = $conn->query($sql_InventarioBodega);

if (!$inventario_bodega_result) {
  echo "Error al ejecutar la consulta: " . $conn->error;
}

/* Incluir archivo de eliminaCIG.php para eliminar un registro de la tabla de cocina */
include "eliminaCIG.php";

/* Mostrar los datos de la BD a la tabla de COCINA */
$sql_InventarioCocina = "SELECT ic.idcocina_inventario, 
                            ct.nombre_cat AS categoria,   -- Alias de la columna nombre_cat en la tabla categorias
                            prod.nombre_prod AS producto, -- Alias de la columna nombre_prod en la tabla productos
                            um.uni_med AS unidad_medida,  -- Alias de la columna uni_med en la tabla unidad_medida
                            ic.inicial_cocina, ic.ec_lunes, ic.sc_lunes, ic.ec_martes, ic.sc_martes, 
                            ic.ec_miercoles, ic.sc_miercoles, ic.ec_jueves, ic.sc_jueves, ic.ec_viernes, 
                            ic.sc_viernes, ic.ec_sabado, ic.sc_sabado, ic.ec_domingo, ic.sc_domingo, 
                            ic.total_cocina, ic.actual_cocina,
                      DATE_FORMAT(ic.fecha_cocina, '%Y-%m-%d a las %H:%i:%s') AS fecha_cocina
                      FROM inventario_cocina AS ic
                      INNER JOIN categorias AS ct ON ic.idcategoria_cocina = ct.id_categoria
                      INNER JOIN productos AS prod ON ic.idproducto_cocina = prod.id_producto
                      INNER JOIN unidad_medida AS um ON ic.idum_cocina = um.id_medida";

$inventario_cocina_result = $conn->query($sql_InventarioCocina);

if (!$inventario_cocina_result) {
  echo "Error al ejecutar la consulta para el inventario de cocina: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/images/marlogo2.png" type="image/x-icon">

  <title>INVENTARIO GENERAL</title>

  <link rel="stylesheet" type="text/css" href="vistas/css/inventariogeneral.css">
  <!-- CSS de bootstrap 5.3 -->
  <link href="vistas/css/bootstrap.min.css" rel="stylesheet">

  <!-- SweetAlert2 Min -->
  <link rel="stylesheet" href="vistas/sweetalert/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="vistas/css/notificacion.css">

  <!-- jQuery -->
  <!--<script src="https://code.jquery.com/jquery-3.7.0.js"></script>-->

  <!-- DataTables -->
  <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>-->

  <!-- Bootstrap -->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">-->
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>-->

  <!-- Bootstrap 5 (CARGA DE MODALES) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="vistas/sweetalert/dist/sweetalert2.all.min.js"></script>

  <!-- Alerta de eliminación de registro de salida -->
  <script src="vistas/js/sweet.js"></script>
</head>

<!-- Menús -->
<?php
include_once("header.php");
/*include_once("slidebar.php");*/
?>

<body>

  <!--Texto sencillo-->
  <h1 class="txt-BIG">ENTRADAS Y SALIDAS - B O D E G A</h1>

  <div class="container">
    <hr>
  </div>

  <!--Botón de agregar entrada y generar reporte-->
  <div class="row justify-content-end">
    <div class="col-auto">
      <a href="vistas/fpdf/rBIG.php" target="_blank" class="btn btn-success btn-generar-reporte-bodega">
        <img src="vistas/iconos/svg/pdf.svg" alt="Generar reporte en Bodega" class="me-2">
        PDF Bodega
      </a>
      <a href="" class="btn btn-success btn-agregar-entrada me-2 " data-bs-toggle="modal" data-bs-target="#MEBodegaIG">
        <img src="vistas/iconos/svg/plus.svg" alt="Agregar entrada" class="me-2" />
        Agregar entrada
      </a>
    </div>
  </div>

  <!--Contenedor que envuelve la tabla entrada bodega-->
  <div class="container-fluid mt-6 position-relative">
    <div class="row">
      <div class="col text-center">

        <!--Tabla de entradas bodega-->
        <div class="table-responsive">
          <table class="table table-hover table-striped mt-4" id="tablebig">

            <!--Encabezado de la tabla-->
            <thead class="table-dark">
              <tr class="table-light">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Lunes</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Martes</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Miércoles</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Jueves</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Viernes</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Sábado</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Domingo</th>
                <!-- Otras columnas -->
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
              <tr>
                <th scope="col" class="pl-1 border border-secondary">Fecha</th>
                <th scope="col" class="pl-1 border border-secondary">Categoría</th>
                <th scope="col" class="pl-1 border border-secondary">Producto</th>
                <th scope="col" class="pl-1 border border-secondary">UM</th>
                <th scope="col" class="pl-1 border border-secondary">Entrada</th>
                <!-- Lunes -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Martes -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Miércoles -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Jueves -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Viernes -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Sábado -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Domingo -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <th scope="col" class="pl-1 border border-secondary">Total</th>
                <th scope="col" class="pl-1 border border-secondary">Actual</th>
                <th scope="col" class="col-action">Acción</th>
              </tr>
            </thead>

            <!--Filas de datos de la tabla entrada bodega-->
            <tbody>
              <?php while ($row_inventariobodega = $inventario_bodega_result->fetch_assoc()) { ?>
                <tr>
                  <td class="fecha-column"><?= $row_inventariobodega['fecha']; ?></td>
                  <td class="categoria-column"><?= $row_inventariobodega['categoria']; ?></td>
                  <td class="producto-column"><?= $row_inventariobodega['producto']; ?></td>
                  <td><?= $row_inventariobodega['unidad_medida']; ?></td>
                  <td><?= $row_inventariobodega['entrada_bodega']; ?></td>
                  <!-- Lunes -->
                  <td class="e-c"><?= $row_inventariobodega['e_lunes']; ?></td>
                  <td><?= $row_inventariobodega['s_lunes']; ?></td>
                  <!-- Martes -->
                  <td class="e-c"><?= $row_inventariobodega['e_martes']; ?></td>
                  <td><?= $row_inventariobodega['s_martes']; ?></td>
                  <!-- Miercoles -->
                  <td class="e-c"><?= $row_inventariobodega['e_miercoles']; ?></td>
                  <td><?= $row_inventariobodega['s_miercoles']; ?></td>
                  <!-- Jueves -->
                  <td class="e-c"><?= $row_inventariobodega['e_jueves']; ?></td>
                  <td><?= $row_inventariobodega['s_jueves']; ?></td>
                  <!-- Viernes -->
                  <td class="e-c"><?= $row_inventariobodega['e_viernes']; ?></td>
                  <td><?= $row_inventariobodega['s_viernes']; ?></td>
                  <!-- Sábado -->
                  <td class="e-c"><?= $row_inventariobodega['e_sabado']; ?></td>
                  <td><?= $row_inventariobodega['s_sabado']; ?></td>
                  <!-- Domingo -->
                  <td class="e-c"><?= $row_inventariobodega['e_domingo']; ?></td>
                  <td><?= $row_inventariobodega['s_domingo']; ?></td>
                  <!-- Otras columnas -->
                  <td><?= $row_inventariobodega['total']; ?></td>
                  <td><?= $row_inventariobodega['actual']; ?></td>
                  <td>
                    <!-- Botón para Editar Registro en BODEGA-->
                    <a href="#" class="btn btn-sm btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#editaEBodegaIG" data-bs-id="<?= $row_inventariobodega['idbodega_inventario']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>

                    <!-- Botón para Eliminar Registro -->
                    <a href="inventariogeneral.php?id=<?= $row_inventariobodega['idbodega_inventario']; ?>" onclick="advertencia(event)" class="btn btn-sm btn-danger btn-action">
                      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#ffffff" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                      </svg>
                    </a>

                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Llamado de datos de categoria al SELECT del modal de ENTRADA DE BODEGA -->
  <?php
  /*Datos de categorías*/
  $sqlCategoria = "SELECT id_categoria, nombre_cat FROM categorias";
  $categoriast = $conn->query($sqlCategoria);

  /*Datos de productos*/
  $sqlProducto = "SELECT id_producto, nombre_prod FROM productos";
  $productost = $conn->query($sqlProducto);

  /*Datos de unidad de medida*/
  $sqlMedida = "SELECT id_medida, uni_med FROM unidad_medida";
  $medidat = $conn->query($sqlMedida);
  ?>

  <!-- Agregamos modal de agregar entrada en bodega -->
  <?php include 'modalagentB.php'; ?>

  <!-- Reiniciamos las variables para el modal de editar -->
  <?php
  $categoriast->data_seek(0);
  $productost->data_seek(0);
  $medidat->data_seek(0);
  ?>

  <!-- Agregamos modal de editar registro salida en bodega -->
  <?php include 'modaleditBIG.php'; ?>

  <!-- Eventos de los modales EDITAR -->
  <script>
    let editaModalBIG = document.getElementById('modaleditBIG')

    /* Momento de cargar estilos y datos del modal, se dispara */
    editaModalBIG.addEventListener('shown.bs.modal', event => {
      let button = event.relatedTarget
      /* Obtener el ID del registro correspondiente de la BD */
      let id = button.getAttribute('data-bs-id')

      /* Accedemos a los elementos del modal para editar */
      let inputId = editaModalBIG.querySelector('.modal-body #id')
      let inputCategoria = editaModalBIG.querySelector('.modal-body #categoria')
      let inputProducto = editaModalBIG.querySelector('.modal-body #producto')
      let inputMedida = editaModalBIG.querySelector('.modal-body #medida')
      let inputEntradaB = editaModalBIG.querySelector('.modal-body #entrada_bodega')
      let inputE_Lunes = editaModalBIG.querySelector('.modal-body #e_lunes')
      let inputS_Lunes = editaModalBIG.querySelector('.modal-body #s_lunes')
      let inputE_Martes = editaModalBIG.querySelector('.modal-body #e_martes')
      let inputS_Martes = editaModalBIG.querySelector('.modal-body #s_martes')
      let inputE_Miercoles = editaModalBIG.querySelector('.modal-body #e_miercoles')
      let inputS_Miercoles = editaModalBIG.querySelector('.modal-body #s_miercoles')
      let inputE_Jueves = editaModalBIG.querySelector('.modal-body #e_jueves')
      let inputS_Jueves = editaModalBIG.querySelector('.modal-body #s_jueves')
      let inputE_Viernes = editaModalBIG.querySelector('.modal-body #e_viernes')
      let inputS_Viernes = editaModalBIG.querySelector('.modal-body #s_viernes')
      let inputE_Sabado = editaModalBIG.querySelector('.modal-body #e_sabado')
      let inputS_Sabado = editaModalBIG.querySelector('.modal-body #s_sabado')
      let inputE_Domingo = editaModalBIG.querySelector('.modal-body #e_domingo')
      let inputS_Domingo = editaModalBIG.querySelector('.modal-body #s_domingo')

      /* Hacemos una consulta SQL con AJAX y traemos la información de los campos */
      let url = "getBodegaIG.php"
      /* Para pasar los datos */
      let formData = new FormData()
      formData.append('idbodega_inventario', id)

      fetch(url, {
          method: "POST",
          body: formData
        }).then(response => response.json())
        /* Contiene los datos del registro y los asignamos a cada uno */
        .then(data => {

          /* Asignamos si es correcto, asignamos los datos */
          inputId.value = data.id
          inputCategoria.value = data.idcategoria_bodega
          inputProducto.value = data.idproducto_bodega
          inputMedida.value = data.idum_bodega
          inputEntradaB.value = data.entrada_bodega
          inputE_Lunes.value = data.e_lunes
          inputS_Lunes.value = data.s_lunes
          inputE_Martes.value = data.e_martes
          inputS_Martes.value = data.s_martes
          inputE_Miercoles.value = data.e_miercoles
          inputS_Miercoles.value = data.s_miercoles
          inputE_Jueves.value = data.e_jueves
          inputS_Jueves.value = data.s_jueves
          inputE_Viernes.value = data.e_viernes
          inputS_Viernes.value = data.s_viernes
          inputE_Sabado.value = data.e_sabado
          inputS_Sabado.value = data.s_sabado
          inputE_Domingo.value = data.e_domingo
          inputS_Domingo.value = data.s_domingo

        }).catch(err => console.log(err))
    });
  </script>

  <!-- ======= INICIO DE INVENTARIO GENERAL DE COCINA ======== -->

  <!--Texto sencillo-->
  <h1 class="txt-CIG">ENTRADAS Y SALIDAS - C O C I N A</h1>

  <div class="container">
    <hr>
  </div>

  <!--Botón de agregar entrada y generar reporte-->
  <div class="row justify-content-end">
    <div class="col-auto">
      <a href="vistas/fpdf/rCIG.php" target="_blank" class="btn btn-success btn-generar-reporte-cocina">
        <img src="vistas/iconos/svg/pdf.svg" alt="Generar reporte en cocina" class="me-2">
        PDF Cocina
      </a>
      <a href="" class="btn btn-success btn-agregar-entrada me-2 " data-bs-toggle="modal" data-bs-target="#MECocinaIG">
        <img src="vistas/iconos/svg/plus.svg" alt="Agregar entrada" class="me-2" />
        Agregar entrada
      </a>
    </div>
  </div>

  <!--Contenedor que envuelve la tabla COCINA-->
  <div class="container-fluid mt-6 position-relative">
    <div class="row">
      <div class="col text-center">

        <!--Tabla de COCINA-->
        <div class="table-responsive">
          <table class="table table-hover table-striped mt-4" id="tablecig">

            <!--Encabezado de la tabla COCINA-->
            <thead class="table-dark">
              <tr class="table-light">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Lunes</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Martes</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Miércoles</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Jueves</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Viernes</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Sábado</th>
                <th colspan="2" scope="col" class="pl-1 border border-secondary">Domingo</th>
                <!-- Otras columnas -->
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
              <tr>
                <th scope="col" class="pl-1 border border-secondary">Fecha</th>
                <th scope="col" class="pl-1 border border-secondary">Categoría</th>
                <th scope="col" class="pl-1 border border-secondary">Producto</th>
                <th scope="col" class="pl-1 border border-secondary">UM</th>
                <th scope="col" class="pl-1 border border-secondary">Inicial</th>
                <!-- Lunes -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Martes -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Miércoles -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Jueves -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Viernes -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Sábado -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <!-- Domingo -->
                <th scope="col" class="pl-1 border border-secondary">E</th>
                <th scope="col" class="pl-1 border border-secondary">S</th>
                <th scope="col" class="pl-1 border border-secondary">Total</th>
                <th scope="col" class="pl-1 border border-secondary">Actual</th>
                <th scope="col" class="col-action">Acción</th>
              </tr>
            </thead>

            <!--Filas de datos de la tabla COCINA-->
            <tbody>
              <?php while ($row_inventariococina = $inventario_cocina_result->fetch_assoc()) { ?>
                <tr>
                  <td class="fecha-column"><?= $row_inventariococina['fecha_cocina']; ?></td>
                  <td class="categoria-column"><?= $row_inventariococina['categoria']; ?></td>
                  <td class="producto-column"><?= $row_inventariococina['producto']; ?></td>
                  <td><?= $row_inventariococina['unidad_medida']; ?></td>
                  <td><?= $row_inventariococina['inicial_cocina']; ?></td>
                  <!-- Lunes -->
                  <td class="e-c"><?= $row_inventariococina['ec_lunes']; ?></td>
                  <td><?= $row_inventariococina['sc_lunes']; ?></td>
                  <!-- Martes -->
                  <td class="e-c"><?= $row_inventariococina['ec_martes']; ?></td>
                  <td><?= $row_inventariococina['sc_martes']; ?></td>
                  <!-- Miercoles -->
                  <td class="e-c"><?= $row_inventariococina['ec_miercoles']; ?></td>
                  <td><?= $row_inventariococina['sc_miercoles']; ?></td>
                  <!-- Jueves -->
                  <td class="e-c"><?= $row_inventariococina['ec_jueves']; ?></td>
                  <td><?= $row_inventariococina['sc_jueves']; ?></td>
                  <!-- Viernes -->
                  <td class="e-c"><?= $row_inventariococina['ec_viernes']; ?></td>
                  <td><?= $row_inventariococina['sc_viernes']; ?></td>
                  <!-- Sábado -->
                  <td class="e-c"><?= $row_inventariococina['ec_sabado']; ?></td>
                  <td><?= $row_inventariococina['sc_sabado']; ?></td>
                  <!-- Domingo -->
                  <td class="e-c"><?= $row_inventariococina['ec_domingo']; ?></td>
                  <td><?= $row_inventariococina['sc_domingo']; ?></td>
                  <!-- Otras columnas -->
                  <td><?= $row_inventariococina['total_cocina']; ?></td>
                  <td><?= $row_inventariococina['actual_cocina']; ?></td>
                  <td>
                    <!-- Botón para Editar Registro EN COCINA-->
                    <a href="#" class="btn btn-sm btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#editaECocinaIG" data-bs-id="<?= $row_inventariococina['idcocina_inventario']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>

                    <!-- Botón para Eliminar Registro -->
                    <a href="inventariogeneral.php?id=<?= $row_inventariococina['idcocina_inventario']; ?>" onclick="advertencia(event)" class="btn btn-sm btn-danger btn-action">
                      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#ffffff" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                      </svg>
                    </a>

                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Llamado de datos de categoria al SELECT del modal de COCINA -->
  <?php
  /*Datos de categorías*/
  $sqlCategoria = "SELECT id_categoria, nombre_cat FROM categorias";
  $categoriast = $conn->query($sqlCategoria);

  /*Datos de productos*/
  $sqlProducto = "SELECT id_producto, nombre_prod FROM productos";
  $productost = $conn->query($sqlProducto);

  /*Datos de unidad de medida*/
  $sqlMedida = "SELECT id_medida, uni_med FROM unidad_medida";
  $medidat = $conn->query($sqlMedida);
  ?>

  <!-- Agregamos modal de agregar entrada de registros en COCINA -->
  <?php include 'modalagentC.php'; ?>

  <!-- Reiniciamos las variables para editar en modal COCINA-->
  <?php
  $categoriast->data_seek(0);
  $productost->data_seek(0);
  $medidat->data_seek(0);
  ?>

  <!-- Agregamos modal de editar registro en COCINA -->
  <?php include 'modaleditCIG.php'; ?>

  <!-- Eventos de los modales EDITAR -->
  <script>
    let editaModalCIG = document.getElementById('modaleditCIG')

    /* Momento de cargar estilos y datos del modal, se dispara */
    editaModalCIG.addEventListener('shown.bs.modal', event => {
      let button = event.relatedTarget
      /* Obtener el ID del registro correspondiente de la BD */
      let id = button.getAttribute('data-bs-id')

      /* Accedemos a los elementos del modal para editar */
      let inputIdC = editaModalCIG.querySelector('.modal-body #id')
      let inputCategoria = editaModalCIG.querySelector('.modal-body #categoria')
      let inputProducto = editaModalCIG.querySelector('.modal-body #producto')
      let inputMedida = editaModalCIG.querySelector('.modal-body #medida')
      let inputInicialC = editaModalCIG.querySelector('.modal-body #inicial_cocina')
      let inputEC_Lunes = editaModalCIG.querySelector('.modal-body #ec_lunes')
      let inputSC_Lunes = editaModalCIG.querySelector('.modal-body #sc_lunes')
      let inputEC_Martes = editaModalCIG.querySelector('.modal-body #ec_martes')
      let inputSC_Martes = editaModalCIG.querySelector('.modal-body #sc_martes')
      let inputEC_Miercoles = editaModalCIG.querySelector('.modal-body #ec_miercoles')
      let inputSC_Miercoles = editaModalCIG.querySelector('.modal-body #sc_miercoles')
      let inputEC_Jueves = editaModalCIG.querySelector('.modal-body #ec_jueves')
      let inputSC_Jueves = editaModalCIG.querySelector('.modal-body #sc_jueves')
      let inputEC_Viernes = editaModalCIG.querySelector('.modal-body #ec_viernes')
      let inputSC_Viernes = editaModalCIG.querySelector('.modal-body #sc_viernes')
      let inputEC_Sabado = editaModalCIG.querySelector('.modal-body #ec_sabado')
      let inputSC_Sabado = editaModalCIG.querySelector('.modal-body #sc_sabado')
      let inputEC_Domingo = editaModalCIG.querySelector('.modal-body #ec_domingo')
      let inputSC_Domingo = editaModalCIG.querySelector('.modal-body #sc_domingo')

      /* Hacemos una consulta SQL con AJAX y traemos la información de los campos */
      let url = "getCocinaIG.php"
      /* Para pasar los datos */
      let formData = new FormData()
      formData.append('idcocina_inventario', id)

      fetch(url, {
          method: "POST",
          body: formData
        }).then(response => response.json())
        /* Contiene los datos del registro y los asignamos a cada uno */
        .then(data => {

          /* Asignamos si es correcto, asignamos los datos */
          inputIdC.value = data.id
          inputCategoria.value = data.idcategoria_cocina
          inputProducto.value = data.idproducto_cocina
          inputMedida.value = data.idum_cocina
          inputInicialC.value = data.inicial_cocina
          inputEC_Lunes.value = data.ec_lunes
          inputSC_Lunes.value = data.sc_lunes
          inputEC_Martes.value = data.ec_martes
          inputSC_Martes.value = data.sc_martes
          inputEC_Miercoles.value = data.ec_miercoles
          inputSC_Miercoles.value = data.sc_miercoles
          inputEC_Jueves.value = data.ec_jueves
          inputSC_Jueves.value = data.sc_jueves
          inputEC_Viernes.value = data.ec_viernes
          inputSC_Viernes.value = data.sc_viernes
          inputEC_Sabado.value = data.ec_sabado
          inputSC_Sabado.value = data.sc_sabado
          inputEC_Domingo.value = data.ec_domingo
          inputSC_Domingo.value = data.sc_domingo

        }).catch(err => console.log(err))
    });
  </script>

  <!-- ======= INICIO DE INVENTARIO GENERAL DE AMBAS TABLAS ======== -->

  <!--Texto sencillo-->
  <h1 class="txt-IG">INVENTARIO GENERAL</h1>

  <div class="container">
    <hr>
  </div>

  <!--Botón de agregar entrada y generar reporte-->
  <div class="row justify-content-end">
    <div class="col-auto">
      <a href="vistas/fpdf/rIG.php" target="_blank" class="btn btn-success btn-generar-reporte-IG">
        <img src="vistas/iconos/svg/pdf.svg" alt="Generar reporte en IG" class="me-2">
        PDF General
      </a>
      <a href="" class="btn btn-success btn-agregar-entrada me-2 " data-bs-toggle="modal" data-bs-target="#MEIG">
        <img src="vistas/iconos/svg/plus.svg" alt="Agregar entrada" class="me-2" />
        Agregar entrada
      </a>
    </div>
  </div>

  <!--Contenedor que envuelve la tabla de INVENTARIO GENERAL-->
  <div class="container-fluid mt-6 position-relative">
    <div class="row">
      <div class="col text-center">

        <!--Tabla de de INVENTARIO GENERAL-->
        <div class="table-responsive">
          <table class="table table-hover table-striped mt-4" id="tableig">

            <!--Encabezado de la tabla de INVENTARIO GENERAL-->
            <thead class="table-dark">
              <tr>
                <th scope="col" class="pl-1 border border-secondary">Fecha</th>
                <th scope="col" class="pl-1 border border-secondary">Producto</th>
                <th scope="col" class="pl-1 border border-secondary">UM</th>
                <th scope="col" class="pl-1 border border-secondary">Actual Bodega</th>
                <th scope="col" class="pl-1 border border-secondary">Actual Cocina</th>
                <th scope="col" class="pl-1 border border-secondary">Total</th>
                <th scope="col" class="col-action">Acción</th>
              </tr>
            </thead>

            <!--Filas de datos de la tabla INVENTARIO GENERAL -->
            <tbody>
              <?php while ($row_inventariogeneral = $inventario_general_result->fetch_assoc()) { ?>
                <tr>
                  <td class="fecha-column"><?= $row_inventariogeneral['fecha_general']; ?></td>
                  <td class="producto-column"><?= $row_inventariogeneral['producto']; ?></td>
                  <td><?= $row_inventariogeneral['unidad_medida']; ?></td>
                  <td><?= $row_inventariogeneral['tbodega_general']; ?></td>
                  <td><?= $row_inventariogeneral['tcocina_general']; ?></td>
                  <td><?= $row_inventariogeneral['total_general']; ?></td>
                  <td>
                    <!-- Botón para Editar Registro EN INVENTARIO GENERAL -->
                    <a href="#" class="btn btn-sm btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#editaEIG" data-bs-id="<?= $row_inventariogeneral['idgeneral_inventario']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>

                    <!-- Botón para Eliminar Registro EN INVENTARIO GENERAL -->
                    <a href="inventariogeneral.php?id=<?= $row_inventariogeneral['idgeneral_inventario']; ?>" onclick="advertencia(event)" class="btn btn-sm btn-danger btn-action">
                      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#ffffff" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                      </svg>
                    </a>

                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>


</body>

<!-- LIBRERIA DE DATATABLE PARA PAGINACIÓN -->
<script>
  $(document).ready(function() {
    $('#tableentrada').DataTable({
      language: {
        lengthMenu: 'Mostrar ' +
          '<select class="custom-select custom-select-sm form-control form-control-sm">' +
          '<option value="5">5</option>' +
          '<option value="10">10</option>' +
          '<option value="25">25</option>' +
          '<option value="50">50</option>' +
          '<option value="100">100</option>' +
          '<option value="-1">Todo</option>' +
          '</select> registros por página',
        zeroRecords: 'No hay registros con esas características',
        info: 'Mostrando la página _PAGE_ de _PAGES_',
        infoEmpty: 'No hay registros disponibles',
        infoFiltered: '(filtrado de _MAX_ registros totales)',
        search: 'Buscar:',
        paginate: {
          next: 'Siguiente',
          previous: 'Anterior'
        }
      },
    });
  });
</script>

</html>