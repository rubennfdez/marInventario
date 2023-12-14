<!-- Modal -->
<div class="modal fade" id="MEBodega" tabindex="-1" aria-labelledby="MEBodegaLabel" aria-hidden="true">

    <!--Hacer más grande el modal-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-2" id="MEBodegaLabel">Agregar nueva entrada</h1>

                <!--Cerrar modal-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <!--Modificación del formulario-->
                <form action="guarda.php" method="post" enctype="multipart/form-data">

                    <!--Categoria-->
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-select" required>
                            <option value="">Selecciona una categoría</option>
                            <?php while ($row_categoria = $categoriast->fetch_assoc()) { ?>
                                <option value="<?php echo $row_categoria["id_categoria"]; ?>">
                                    <?= $row_categoria["nombre_cat"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--Producto-->
                    <div class="mb-3">
                        <label for="producto" class="form-label">Producto:</label>
                        <select name="producto" id="producto" class="form-select" required>
                            <option value="">Selecciona el producto</option>
                            <?php while ($row_producto = $productost->fetch_assoc()) { ?>
                                <option value="<?php echo $row_producto["id_producto"]; ?>">
                                    <?= $row_producto["nombre_prod"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Unidad de Medida -->
                    <div class="mb-3">
                        <label for="medida" class="form-label">Unidad de Medida:</label>
                        <select name="medida" id="medida" class="form-select" required>
                            <option value="">Selecciona la unidad de medida</option>
                            <?php while ($row_medida = $medidat->fetch_assoc()) { ?>
                                <option value="<?php echo $row_medida["id_medida"]; ?>">
                                    <?= $row_medida["uni_med"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Cantidad de entrada en bodega -->
                    <div class="mb-3">
                        <label for="entradab" class="form-label">Cantidad de entrada:</label>
                        <input type="text" name="entradab" id="entradab" class="form-control" 
                        required oninput="validarEntrada(this, 'numMensaje')">
                        <span id="numMensaje" class="text-danger"></span>
                    </div>

                    <!-- Título "Entradas por días de la semana" -->
                    <h4 class="text-center-bold">Entradas por días de la semana</h4>


                    <!-- Separador superior -->
                    <hr class="my-custom-separator">

                    <!-- Días de la semana -->
                    <div class="row mb-3">

                        <!-- Lunes a Jueves -->
                        <div class="col-md-3">
                            <label for="lunes" class="form-label">Lunes:</label>
                            <input type="text" name="lunes" id="lunes" class="form-control entrada-semana" required>
                            <span id="lunesMensaje" class="mensaje-error"></span>
                        </div>

                        <!-- Martes -->
                        <div class="col-md-3">
                            <label for="martes" class="form-label">Martes:</label>
                            <input type="text" name="martes" id="martes" class="form-control entrada-semana" required>
                            <span id="martesMensaje" class="mensaje-error"></span>
                        </div>

                        <!-- Miércoles -->
                        <div class="col-md-3">
                            <label for="miercoles" class="form-label">Miércoles:</label>
                            <input type="text" name="miercoles" id="miercoles" class="form-control entrada-semana" required>
                            <span id="miercolesMensaje" class="mensaje-error"></span>
                        </div>

                        <!-- Jueves -->
                        <div class="col-md-3">
                            <label for="jueves" class="form-label">Jueves:</label>
                            <input type="text" name="jueves" id="jueves" class="form-control entrada-semana" required>
                            <span id="juevesMensaje" class="mensaje-error"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Viernes a Domingo -->
                        <div class="col-md-4">
                            <label for="viernes" class="form-label">Viernes:</label>
                            <input type="text" name="viernes" id="viernes" class="form-control entrada-semana" required>
                            <span id="viernesMensaje" class="mensaje-error"></span>
                        </div>

                        <!-- Sábado -->
                        <div class="col-md-4">
                            <label for="sabado" class="form-label">Sábado:</label>
                            <input type="text" name="sabado" id="sabado" class="form-control entrada-semana" required>
                            <span id="sabadoMensaje" class="mensaje-error"></span>
                        </div>

                        <!-- Domingo -->
                        <div class="col-md-4">
                            <label for="domingo" class="form-label">Domingo:</label>
                            <input type="text" name="domingo" id="domingo" class="form-control entrada-semana" required>
                            <span id="domingoMensaje" class="mensaje-error"></span>
                        </div>
                    </div>

                    <!-- Separador inferior después de los días de la semana (Viernes a Domingo) -->
                    <hr class="my-custom-separator">

                    <!-- Contenedor principal -->
                    <div class="d-flex justify-content-center align-items-center">
                            <!-- Cerrar -->
                            <button type="button" class="btn btn-secondary me-4 w-100" data-bs-dismiss="modal">
                                <img src="vistas/iconos/svg/close.svg" alt="Cerrar" class="icon">
                                <span class="text">Cerrar</span>
                            </button>

                            <!-- Guardar -->
                            <button type="submit" class="btn btn-primary ms-4 w-100">
                                <img src="vistas/iconos/svg/save.svg" alt="Guardar" class="icon">
                                <span class="text">Guardar</span>
                            </button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!-- Cargamos archivos CSS y JS -->
<link rel="stylesheet" href="vistas/css/modalagentbodega.css">
<script src="vistas/js/modalagentbodega.js"></script>