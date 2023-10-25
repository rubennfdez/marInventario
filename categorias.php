<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="vistas/images/marlogo2.png" type="image/x-icon">
    <title>Categorias</title>
   
    <link rel="stylesheet" href="vistas/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/styles.css">
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
    <a class="btn btn-dark btn-lg" href="agregarcategoria.php" role="button">AGREAR CATEGORÍA</a>

        <div class="row">
                <h1 class="font-weight-bold">>CATÁLOGO | CATEGORÍAS</h1>
                <p class="lead text-muted">TODAS LAS SECCIONES DISPONIBLES</p>

                <div class="container">
                    <div class="categoria-container">

                        <div class="categoria" data-name="p-1">
                            <img src="vistas/iconos/carne.png" alt="">
                            <h3>CARNES</h3>
                        </div>

                        <div class="categoria" data-name="p-2">
                            <img src="vistas/iconos/mariscos.png" alt="">
                            <h3>MARISCOS</h3>
                        </div>

                        <div class="categoria" data-name="p-3">
                            <img src="vistas/iconos/pez.png" alt="">
                            <h3>PESCADOS</h3>
                        </div>

                        <div class="categoria" data-name="p-4">
                            <img src="vistas/iconos/refrigerador.png" alt="">
                            <h3>REFRIGERACIÓN</h3>
                        </div>

                        <div class="categoria" data-name="p-5">
                            <img src="vistas/iconos/congelador.png" alt="">
                            <h3>CONGELADOS</h3>
                        </div>

                        <div class="categoria" data-name="p-6">
                            <img src="vistas/iconos/embutido.png" alt="">
                            <h3>EMBUTIDOS</h3>
                        </div>
                        <div class="categoria" data-name="p-7">
                            <img src="vistas/iconos/lacteos.png" alt="">
                            <h3>LACTEOS</h3>
                        </div>

                        <div class="categoria" data-name="p-8">
                            <img src="vistas/iconos/frutas.png" alt="">
                            <h3>FRUTAS Y VERDURAS</h3>
                        </div>

                        <div class="categoria" data-name="p-9">
                            <img src="vistas/iconos/viveres.png" alt="">
                            <h3>ABARROTES</h3>
                        </div>
                        
                        <div class="categoria" data-name="p-10">
                            <img src="vistas/iconos/chile.png" alt="">
                            <h3>CHILES SECOS</h3>
                        </div>

                        <div class="categoria" data-name="p-11">
                            <img src="vistas/iconos/refresco.png" alt="">
                            <h3>REFRESCOS</h3>
                        </div>

                        <div class="categoria" data-name="p-12">
                            <img src="vistas/iconos/vino.png" alt="">
                            <h3>VINOS Y LICORES</h3>

                    </div>

                </div>

                <div class="categoria-preview">
                    <div class="preview" data-target="p-1">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/carne.png" alt="">
                        <h3>CARNES</h3>
                        <p>Contenido: 
                            Alitas,
                            Arracherra marinada,
                            Arracherra Premium Boutique,
                            Boneles,
                            Carne para Hamburguesa.
                            Cow body,
                            New York,
                            Reb Eye,
                            T-BONE,
                            Pechugas de pollo
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-2">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/mariscos.png" alt="">
                        <h3>MARISCOS</h3>
                        <p>Contenido:
                            Camaron,
                            Aleta de calamar,
                            Almejas,
                            Caracol,
                            Jaiba,
                            Langostas,
                            Mejillones
                            Ostion
                            Pigua,
                            Pulpo
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-3">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/pez.png" alt="">
                        <h3>PESCADOS</h3>
                        <p>Contenido:
                            Barracuda,
                            Filete Tilapia,
                            Huachinango,
                            Medallon de Atun,
                            Mojarra,
                            Pargo,
                            Pejelagarto,
                            Robalo,
                            Aleta de calamar,
                            Salmon
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-4">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/refrigerador.png" alt="">
                        <h3>REFRIGERACIÓN</h3>
                        <p>Contenido:
                            Cereza,
                            Chile mashito,
                            Huevo,
                            Jugo de limon,
                            Tomate Cherry
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-5">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/congelador.png" alt="">
                        <h3>CONGELADOS</h3>
                        <p>Contenido:
                            Aros de cebolla,
                            Chocolate Turin,
                            Dedos de queso,
                            Frambuesa,
                            Fresas congeladas.
                            Mantequilla,
                            Pulpa de mango
                            Y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-6">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/embutido.png" alt="">
                        <h3>EMBUTIDOS</h3>
                        <p>Contenido:
                            Chistorra,
                            Chorizo argentino,
                            Chorizo Esmpañol. 
                            Salchicha para asar,
                            Tocino
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>
                    
                    <div class="preview" data-target="p-7">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/lacteos.png" alt="">
                        <h3>LACTEOS</h3>
                        <p>Contenido:
                            Chantilly,
                            Crema Lyncont,
                            Crema para batir,
                            Queso americano,
                            Queso de hebra,
                            Queso Filadelphia
                            Queso Gouda
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-8">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/frutas.png" alt="">
                        <h3>FRUTAS Y VERDURAS</h3>
                        <p>Contenido:
                            Aguacate,
                            Ajo,
                            Apio,
                            Brocoli
                            Calabaza,
                            Cebolla,
                            Chaya,
                            Chile Jalapeño,
                            Chile Serrano
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-9">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/viveres.png" alt="">
                        <h3>ABARROTES</h3>
                        <p>Contenido:
                            Valentina,
                            Vaso de licuadora,
                            Vasos termicos,
                            Vinagre,
                            Vino blanco,
                            Desechables
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-10">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/chile.png" alt="">
                        <h3>CHILES SECOS</h3>
                        <p>Contenido:
                            Chile de Arbol,
                            Guajillo,
                            Chiltepin,
                            Pasilla,
                            Color,
                            Piquin,
                            Chipotle seco,
                            Clavo de olor,
                            Oregano verde,
                            Hojas de laurel
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                    <div class="preview" data-target="p-11">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/refresco.png" alt="">
                        <h3>REFRESCOS</h3>
                        <p>Contenido:
                            Agua Mineral,
                            Coca cola,
                            Sprite,
                            Squirt
                            y mas...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>
                    <div class="preview" data-target="p-12">
                        <i class="fas fa-times"></i>
                        <img src="vistas/iconos/vino.png" alt="">
                        <h3>VINOS Y LICORES</h3>
                        <p>Contenido:
                            WHISKYS,
                            VODKAS,
                            TEQUILAS,
                            LICORES Y CREMAS,
                            CHAMPAGNE,
                            GINEBRAS
                            y MAS...
                        </p>
                        <h3><b>IR A PRODUCTOS</b></h3>
                        <div class="buttons">
                            <a href="#" class="buy">Visualizar</a>
                            <a href="#" class="cart">Agregar</a>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</body>

</html>

</html>