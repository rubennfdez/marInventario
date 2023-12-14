<!-- Modal Entrada Cocina-->
<div class="modal fade" id="MECocina" tabindex="-1" aria-labelledby="MECocinaLabel" aria-hidden="true">

    <!--Hacer más grande el modal-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <!-- Icono para agregar nueva entrada -->
                <img src="vistas/iconos/png/exit.png" alt="Icono de nueva entrada" class="icon">
                <h1 class="modal-title fs-1" id="MECocinaLabel">AGREGAR NUEVA ENTRADA</h1>

                <!--Cerrar modal-->
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            
            <div class="modal-body">

                <!--Modificación del formulario-->
                <form action="guardaentradac.php" method="post" enctype="multipart/form-data">

                    <!--Categoria-->
                    <div class="mb-3">
                        <label for="categoria" class="form-label">CATEGORIA:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <!-- Ícono de Categoria -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                                        <path d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                                    </svg>
                                </div>
                            </div>
                            <select name="categoria" id="categoria" class="form-select" required>
                                <option value="">Selecciona una categoría</option>
                                <?php while ($row_categoria = $categoriast->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_categoria["id_categoria"]; ?>">
                                        <?= $row_categoria["nombre_cat"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--Producto-->
                    <div class="mb-3">
                        <label for="producto" class="form-label">PRODUCTO:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <!-- Ícono de Producto-->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                                    </svg>
                                </div>
                            </div>
                            <select name="producto" id="producto" class="form-select" required>
                                <option value="">Selecciona el producto</option>
                                <?php while ($row_producto = $productost->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_producto["id_producto"]; ?>">
                                        <?= $row_producto["nombre_prod"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Unidad de Medida -->
                    <div class="mb-3 form-group">
                        <label for="medida" class="form-label">UNIDAD DE MEDIDA:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <!-- Ícono de unidad de medida -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#ffffff" d="M128 176a128 128 0 1 1 256 0 128 128 0 1 1 -256 0zM391.8 64C359.5 24.9 310.7 0 256 0S152.5 24.9 120.2 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H391.8zM296 224c0-10.6-4.1-20.2-10.9-27.4l33.6-78.3c3.5-8.1-.3-17.5-8.4-21s-17.5 .3-21 8.4L255.7 184c-22 .1-39.7 18-39.7 40c0 22.1 17.9 40 40 40s40-17.9 40-40z" />
                                    </svg>
                                </div>
                            </div>
                            <select name="medida" id="medida" class="form-select" required>
                                <option value="">Selecciona la unidad de medida</option>
                                <?php while ($row_medida = $medidat->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_medida["id_medida"]; ?>">
                                        <?= $row_medida["uni_med"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <!-- Valor inicial del producto en salida -->
                    <div class="mb-3 form-group">
                        <label for="inicialentradac" class="form-label">VALOR INICIAL:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <!-- Ícono de cantidad -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="33" width="33" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#FFFFFF" d="M58.9 42.1c3-6.1 9.6-9.6 16.3-8.7L320 64 564.8 33.4c6.7-.8 13.3 2.7 16.3 8.7l41.7 83.4c9 17.9-.6 39.6-19.8 45.1L439.6 217.3c-13.9 4-28.8-1.9-36.2-14.3L320 64 236.6 203c-7.4 12.4-22.3 18.3-36.2 14.3L37.1 170.6c-19.3-5.5-28.8-27.2-19.8-45.1L58.9 42.1zM321.1 128l54.9 91.4c14.9 24.8 44.6 36.6 72.5 28.6L576 211.6v167c0 22-15 41.2-36.4 46.6l-204.1 51c-10.2 2.6-20.9 2.6-31 0l-204.1-51C79 419.7 64 400.5 64 378.5v-167L191.6 248c27.8 8 57.6-3.8 72.5-28.6L318.9 128h2.2z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="inicialentradac" id="inicialentradac" required oninput="validarEntrada(this, 'numMensaje')">
                            <span id="numMensaje" class="text-danger"></span>
                        </div>
                    </div>

                    <!-- Separador superior -->
                    <hr class="my-custom-separator">

                    <!-- Contenedor principal -->
                    <div class="d-flex justify-content-end align-items-center">
                        <!-- Cerrar -->
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
                                <path fill="#ffffff" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                            </svg>
                            <span class="text">Cerrar</span>
                        </button>

                        <!-- Guardar -->
                        <button type="submit" class="btn btn-primary ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                            </svg>
                            <span class="text">Guardar</span>
                        </button>                  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cargamos archivos CSS y JS -->
<link rel="stylesheet" href="vistas/css/modalagentcocina.css">
<script src="vistas/js/modalagentcocina.js"></script>