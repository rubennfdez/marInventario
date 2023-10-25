<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="vistas/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="vistas/css/style.css">
   <link rel="stylesheet" href="vistas/css/all.min.css">
   <link rel="stylesheet" href="vistas/css/fontawesome.min.css">
   <link rel="icon" href="vistas/images/marlogo2.png" type="image/x-icon">
   <title>Marbella Paraiso</title>
</head>

<body>
   <section class="form-02-main">
      <div class="container">
         </form>
         <div class="row">
            <div class="col-md-12">
               <div class="_lk_de">
                  <div class="form-03-main">
                     <div class="login-content">
                        <form method="post" action="">
                           <img src="vistas/images/marlogo1.png">
                           <h2 class="title">BIENVENIDO</h2>
                           <?php
                           include("vistas/modulos/conexion.php");
                           include("vistas/modulos/controlador.php");
                           ?>
                           <div class="input-div one">
                              <div class="i">
                                 <i class="fas fa-user"></i>
                              </div>
                              <div class="div">
                                 <h5>Usuario</h5>
                                 <input id="usuario" type="text" class="input" name="usuario">
                              </div>
                           </div>
                           <div class="input-div pass">
                              <div class="i">
                                 <i class="fas fa-lock"></i>
                              </div>
                              <div class="div">
                                 <h5>Contraseña</h5>
                                 <input type="password" id="input" class="input" name="pass">
                              </div>
                           </div>
                           <div class="view">
                              <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                           </div>
                           <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
                           <div class="text-center">
                              <a class="font-italic isai5" href="recuperar.php">Olvidé mi contraseña</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </section>
   <script src="vistas/js/fontawesome.js"></script>
   <script src="vistas/js/main.js"></script>
   <script src="vistas/js/main2.js"></script>
   <script src="vistas/js/jquery.min.js"></script>
   <script src="vistas/js/bootstrap.js"></script>
   <script src="vistas//js/bootstrap.bundle.js"></script>

</body>

</html>