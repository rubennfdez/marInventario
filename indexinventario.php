<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INVENTARIO</title>
  <link rel="icon" href="assets/images/marlogo2.png" type="image/x-icon">

  <!-- CSS de bootstrap 5.3 -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="vistas/css/inventario.css">-->
  <link rel="stylesheet" href="vistas/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="vistas/css/stylesinv.css">
  <link rel="stylesheet" href="vistas/css/all.min.css">
  <link rel="stylesheet" href="vistas/css/fontawesome.min.css">
  <script src="vistas/js/scriptinv.js" defer></script>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<!--
<style>
  .img-iconos {
    display: flex; /*Caja flexible para la clase*/
    flex-direction: column; /*Uno debajo del otro, dirección principal*/
    align-items: center; /*Centra horizontalmente*/
    justify-content: center; /*Centra verticalmente*/
    height: 250px; /*Altura del contenedor de la clase*/
    padding-top: 30px; /*Espacio entre el título y las img*/
    text-align: center; /*Centra el contenido a la pantalla*/
  }

  .img-iconos img {
    margin-bottom: 20px; /*Espacios entre imágenes*/
    width: 500px; /*Ancho de las img*/
  }

  .parrafo {
    background-color: darkcyan; /*Color de fondo*/
    text-align: center; /*El texto al centro de la pantalla*/
    padding: 10px; /*Grosor del background*/
  }

  .txt {
    font-size: 50px;
    font-weight: bold;
  }
</style>
-->

<?php
include_once("header.php");
include_once("slidebar.php");
?>

<body>

  <div class="parrafo">
    <h1 class="txt">SELECCIONA EL ÁREA</h1>
  </div>

  <!--DIV para envolver el contenedor-->
  <div id="contenido">
    <div class="row">

      <!--DIV para envolver los cuadros con las impágenes-->
      <div class="container">
        <div class="inventario-container">

          <div class="inventario" data-name="p-1">
            <img src="vistas/iconos/cocina.png" alt="">
            <h3>COCINA</h3>
          </div>

          <div class="inventario" data-name="p-2">
            <img src="vistas/iconos/bodega.png" alt="">
            <h3>BODEGA</h3>
          </div>

        </div>
      </div>

      <!--DIV para el modal al momento de dar click-->
      <div class="inventario-preview">

        <!--COCINA-->
        <div class="preview" data-target="p-1">
          <i class="fas fa-times"></i>
          <h3><b>INVENTARIO DE COCINA</b></h3>
          <img src="vistas/iconos/cocina.png" alt="">
          <p>
            Agrega una entrada o salida de productos
            del área de cocina. 
          </p>
          <div class="buttons">
            <a href="entradacocina.php" class="buy1">Entrada</a>
            <a href="salidacocina.php" class="cart1">Salida</a>
          </div>
        </div>

        <!--BODEGA-->
        <div class="preview" data-target="p-2">
          <i class="fas fa-times"></i>
          <h3><b>INVENTARIO DE BODEGA</b></h3>
          <img src="vistas/iconos/bodega.png" alt="">
          <p>
            Agrega una entrada o salida de productos
            del área de bodega. 
          </p>
          <div class="buttons">
            <a href="entradabodega.php" class="buy2">Entrada</a>
            <a href="salidabodega.php" class="cart2">Salida</a>
          </div>
        </div>

      </div>

    </div>
  </div>
</body>

</html>