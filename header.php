<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="vistas/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/miestilo.css">
    <link rel="stylesheet" href="vistas/css/all.min.css">
    <link rel="stylesheet" href="vistas/css/fontawesome.min.css">
    <title>Pagina Inicio</title>


    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <img src="vistas/images/marlogo2.png" alt="Logotipo" width="100" height="50">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <li class="nav-item dropdown">
                        <!--Inventario-->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            INVENTARIO GENERAL
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="inventarioentradas.php" data-bs-toggle="modal" data-bs-target="#Entrada">
                                    ENTRADAS</a></li>
                            <li><a class="dropdown-item" href="inventariosalidas.php" data-bs-toggle="modal" data-bs-target="#Salida">
                                    SALIDAS</a></li>
                        </ul>
                    </li>
                    </li>
                    <!--Productos-->
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">PRODUCTOS</a>
                    </li>

                    <!--Categorias-->
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php">CATEGORÍAS</a>
                    </li>
                    </li>

                    <!--Ubicacion-->

                    <li class="nav-item">
                        <a class="nav-link" href="ubicacion.php">UBICACIÓN</a>
                    </li>

                    <!--Proveedores-->

                    <li class="nav-item">
                        <a class="nav-link" href="proveedores.php">PROVEEDORES</a>
                    </li>
                    <!--Contacto-->
                </ul>
                <form class="d-flex" role="search">

                </form>
                <li class="nav-item">
                <button onclick="cerrarSesion()" type="button" class="btn btn-light">CERRAR SESIÓN  <ion-icon name="exit-outline"></ion-icon></button>
                    <script>
                        function cerrarSesion() {
                            window.location.href = "login.php";
                        }
                    </script>
                </li>
            </div>
        </div>
    </nav>
   

</head>