<?php
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="vistas/images/marlogo2.png" type="image/x-icon">
   <title>Proveedores</title>
   <!--CSS de bootstrap 5.3-->
   <link rel="stylesheet" href="vistas/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="maquina.css">
   <link rel="stylesheet" href="vistas/css/all.min.css">
   <link rel="stylesheet" href="vistas/css/fontawesome.min.css">

   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
   <script src="vistas/js/scriptcat.js" defer></script>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<?php

include_once("header.php");
include_once("slidebar.php");
?>

<body>
   <div id="contenido">


      <h1 class="font-weight-bold">>PROVEEDORES</h1> 





      <?php
      include_once("indexproveedores.php");
      ?>


   </div>



</body>

</html>

</html>