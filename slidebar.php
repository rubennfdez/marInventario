<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="vistas/css/style2.css">
</head>

<body>
<div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
    <div class="barra-lateral">
        <div class="usuario">
            <div class="info-usuario">
                <div class="nombre-email">
                    <span class="nombre">MARBELLA PARAÍSO </span>
                    <span class="email">SISTEMA DE INVENTARIO v1.0</span>
                </div>
                <ion-icon name="ellipsis-vertical-outline"></ion-icon>
            </div>
        </div>
        <div>
            <div class="nombre-pagina">
                <span>MENU</span>
            </div>
        </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="usuarios.php">
                    <ion-icon name="person-circle-outline"></ion-icon>
                        <span>USUARIOS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <ion-icon name="key-outline"></ion-icon>
                        <span>CONTRASEÑAS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <ion-icon name="documents-outline"></ion-icon>
                        <span>REPORTES</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <ion-icon name="cash-outline"></ion-icon>
                        <span>INVERSIONES</span>
                    </a>
                </li>
        
                <li>
                    <a href="#">
                        <ion-icon name="help-circle-outline"></ion-icon>
                        <span>AYUDA</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                    <ion-icon name="log-out-outline"></ion-icon>
                        <span>SALIR</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>OSCURO</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<img src="vistas/images/marpat.jpg" />-->
    <main>
        
    <footer class="footer">
	<strong>Copyright &copy; 2023 <a href="https://www.facebook.com/marbellaparaisotab" target="_blank">Marbella Paraiso</a>.</strong>
	Todos los derechos reservados.
    </footer>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="vistas/js/scripts.js"></script>
</body>

</html>