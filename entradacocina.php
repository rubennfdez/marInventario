<?php
/*Conexión para cargar datos al modal*/
require 'configbd2.php';

/* Incluir el elimina.php para el botón de eliminar registro */
include "eliminaentradac.php";

/* Mostrar los datos de la BD a la tabla de entrada - cocina*/
$sqlEntrada_Cocina = "SELECT ec.idcocina_entrada, 
                             ct.nombre_cat AS categoria,   -- Alias de la columna nombre_cat en la tabla categorias
                             prod.nombre_prod AS producto, -- Alias de la columna nombre_prod en la tabla productos
                             um.uni_med AS unidad_medida,  -- Alias de la columna uni_med en la tabla unidad_medida
                             ec.inicial_cocina, ec.lunes, ec.martes, ec.miercoles, 
                             ec.jueves, ec.viernes, ec.sabado, ec.domingo, ec.total
                      FROM entrada_cocina AS ec
                      INNER JOIN categorias AS ct ON ec.id_categoria_cocina = ct.id_categoria
                      INNER JOIN productos AS prod ON ec.id_producto_cocina = prod.id_producto
                      INNER JOIN unidad_medida AS um ON ec.id_unidadm_cocina = um.id_medida";

$entrada_cocina_result = $conn->query($sqlEntrada_Cocina);

if (!$entrada_cocina_result) {
  echo "Error al ejecutar la consulta: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/images/marlogo2.png" type="image/x-icon">

  <title>Entrada Cocina</title>

  <link rel="stylesheet" type="text/css" href="vistas/css/entradacocina.css">
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
include_once("slidebar.php");
?>

<body>

  <!--Texto sencillo-->
  <h1 class="txt-entradac">ENTRADA COCINA</h1>

  <div class="container">
    <hr>
  </div>

  <!--Botón de agregar entrada y generar reporte-->
  <div class="row justify-content-end">
    <div class="col-auto">
      <a href="vistas/fpdf/rEntradaCocina.php" target="_blank" class="btn btn-success btn-generar-reporte">
        <img src="vistas/iconos/svg/pdf.svg" alt="Generar reporte" class="me-2">
        Generar reporte
      </a>
      <a href="" class="btn btn-success btn-agregar-entrada me-2 " data-bs-toggle="modal" data-bs-target="#MECocina">
        <img src="vistas/iconos/svg/plus.svg" alt="Agregar entrada" class="me-2" />
        Agregar entrada
      </a>
    </div>
  </div>

  <!--Contenedor que envuelve la tabla entrada cocina-->
  <div class="container-fluid mt-6 position-relative">
    <div class="row">
      <div class="col text-center">

        <!--Tabla de entradas cocina-->
        <div class="table-responsive">
          <table class="table table-hover table-striped mt-4" id="tableentradac">

            <!--Encabezado de la tabla-->
            <thead class="table-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Categoría</th>
                <th scope="col">Producto</th>
                <th scope="col">UM</th>
                <th scope="col">Inicial</th>
                <th scope="col">L</th>
                <th scope="col">M</th>
                <th scope="col">M</th>
                <th scope="col">J</th>
                <th scope="col">V</th>
                <th scope="col">S</th>
                <th scope="col">D</th>
                <th scope="col">Total</th>
                <th scope="col" class="col-action">Acción</th>
              </tr>
            </thead>

            <!--Filas de datos de la tabla entrada cocina-->
            <tbody>
              <?php while ($row_entradacocina = $entrada_cocina_result->fetch_assoc()) { ?>
                <tr>
                  <td><?= $row_entradacocina['idcocina_entrada']; ?></td>
                  <td><?= $row_entradacocina['categoria']; ?></td>
                  <td><?= $row_entradacocina['producto']; ?></td>
                  <td><?= $row_entradacocina['unidad_medida']; ?></td>
                  <td><?= $row_entradacocina['inicial_cocina']; ?></td>
                  <td><?= $row_entradacocina['lunes']; ?></td>
                  <td><?= $row_entradacocina['martes']; ?></td>
                  <td><?= $row_entradacocina['miercoles']; ?></td>
                  <td><?= $row_entradacocina['jueves']; ?></td>
                  <td><?= $row_entradacocina['viernes']; ?></td>
                  <td><?= $row_entradacocina['sabado']; ?></td>
                  <td><?= $row_entradacocina['domingo']; ?></td>
                  <td><?= $row_entradacocina['total']; ?></td>
                  <td>
                    <!-- Botón para Editar Registro -->
                    <a href="#" class="btn btn-sm btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#editaECocina" data-bs-id="<?= $row_entradacocina['idcocina_entrada']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                      Editar
                    </a>

                    <!-- Botón para Eliminar Registro -->
                    <a href="entradacocina.php?id=<?= $row_entradacocina['idcocina_entrada']; ?>" onclick="advertencia(event)" class="btn btn-sm btn-danger btn-action">
                      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#ffffff" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                      </svg>
                      Eliminar
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

  <!--Llamado de datos de categoria al SELECT del modal-->
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

  <!-- Agregamos modal de agregar entrada en cocina -->
  <?php include 'modalagentcocina.php'; ?>

  <!-- Reiniciamos las variables -->
  <?php
  $categoriast->data_seek(0);
  $productost->data_seek(0);
  $medidat->data_seek(0);
  ?>

  <!-- Agregamos modal de editar registro entrada en cocina -->
  <?php include 'modaleditentcocina.php'; ?>

  <!-- Eventos de los modales EDITAR -->
  <script>
    let editaModalEC = document.getElementById('modaleditentcocina')

    /* Momento de cargar estilos y datos del modal, se dispara */
    editaModalEC.addEventListener('shown.bs.modal', event => {
      let button = event.relatedTarget
      /* Obtener el ID del registro correspondiente de la BD */
      let id = button.getAttribute('data-bs-id')

      /* Accedemos a los elementos del modal para editar */
      let inputId = editaModalEC.querySelector('.modal-body #id')
      let inputCategoria = editaModalEC.querySelector('.modal-body #categoria')
      let inputProducto = editaModalEC.querySelector('.modal-body #producto')
      let inputMedida = editaModalEC.querySelector('.modal-body #medida')
      let inputInicialEC = editaModalEC.querySelector('.modal-body #inicialentradac')
      let inputLunes = editaModalEC.querySelector('.modal-body #lunes')
      let inputMartes = editaModalEC.querySelector('.modal-body #martes')
      let inputMiercoles = editaModalEC.querySelector('.modal-body #miercoles')
      let inputJueves = editaModalEC.querySelector('.modal-body #jueves')
      let inputViernes = editaModalEC.querySelector('.modal-body #viernes')
      let inputSabado = editaModalEC.querySelector('.modal-body #sabado')
      let inputDomingo = editaModalEC.querySelector('.modal-body #domingo')

      /* Hacemos una consulta SQL con AJAX y traemos la información de los campos */
      let url = "getEntradaCocina.php"
      /* Para pasar los datos */
      let formData = new FormData()
      formData.append('idcocina_entrada', id)

      fetch(url, {
          method: "POST",
          body: formData
        }).then(response => response.json())
        /* Contiene los datos del registro y los asignamos a cada uno */
        .then(data => {

          /* Asignamos si es correcto, asignamos los datos */
          inputId.value = data.id
          inputCategoria.value = data.id_categoria_cocina
          inputProducto.value = data.id_producto_cocina
          inputMedida.value = data.id_unidadm_cocina
          inputInicialEC.value = data.inicial_cocina
          inputLunes.value = data.lunes
          inputMartes.value = data.martes
          inputMiercoles.value = data.miercoles
          inputJueves.value = data.jueves
          inputViernes.value = data.viernes
          inputSabado.value = data.sabado
          inputDomingo.value = data.domingo

        }).catch(err => console.log(err))
    });
  </script>
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