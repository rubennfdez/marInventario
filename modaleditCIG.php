<!-- Modal Editar de la tabla COCINA -->
<div class="modal fade" id="editaECocinaIG" tabindex="-1" aria-labelledby="EditaECLabelIG" aria-hidden="true">

    <!--Hacer más grande el modal-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-edit">

                <!-- Icono para EDITAR la entrada -->
                <img src="vistas/iconos/png/edit.png" alt="Icono de editar entrada y salida cocina" class="icon-edit">
                <div>
                    <!-- Título principal -->
                    <h1 class="modal-title fs-1" id="EditaECLabelIG">EDITAR REGISTROS</h1>

                    <!-- Subtítulo -->
                    <h2 class="modal-title fs-2" id="EditaECLabelIG">ENTRADAS Y SALIDAS | COCINA</h2>
                </div>

                <!--Cerrar modal-->
                <button type="button" class="btn-close cerrar-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <!--Modificación del formulario-->
                <form action="actualizaCIG.php" method="post">

                    <!-- Generamos el ID  -->
                    <input type="hidden" id="id" name="id">

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
                    <div class="mb-3">
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

                    <!-- Cantidad de entrada INICIAL EN COCINA-->
                    <div class="mb-3">
                        <!-- El "for" el "name" y el "id" tiene que ser igual a la obtención de datos  --->
                        <label for="inicial_cocina" class="form-label">CANTIDAD DE INICIO:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <!-- Ícono de cantidad -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="33" width="33" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#FFFFFF" d="M58.9 42.1c3-6.1 9.6-9.6 16.3-8.7L320 64 564.8 33.4c6.7-.8 13.3 2.7 16.3 8.7l41.7 83.4c9 17.9-.6 39.6-19.8 45.1L439.6 217.3c-13.9 4-28.8-1.9-36.2-14.3L320 64 236.6 203c-7.4 12.4-22.3 18.3-36.2 14.3L37.1 170.6c-19.3-5.5-28.8-27.2-19.8-45.1L58.9 42.1zM321.1 128l54.9 91.4c14.9 24.8 44.6 36.6 72.5 28.6L576 211.6v167c0 22-15 41.2-36.4 46.6l-204.1 51c-10.2 2.6-20.9 2.6-31 0l-204.1-51C79 419.7 64 400.5 64 378.5v-167L191.6 248c27.8 8 57.6-3.8 72.5-28.6L318.9 128h2.2z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="text" name="inicial_cocina" id="inicial_cocina" class="form-control" required oninput="validarEntrada(this, 'numMensaje')">
                            <span id="numMensaje" class="text-danger"></span>
                        </div>
                    </div>

                    <!-- Título "Entradas y Salidas por días de la semana" -->
                    <h4 class="text-center-bold">ENTRADAS Y SALIDAS POR DÍAS DE LA SEMANA</h4>

                    <!-- Separador superior -->
                    <hr class="my-custom-separator">

                    <!-- Contenedor de las filas para entradas y salidas -->
                    <div class="row mb-3">

                        <!-- Entradas -->
                        <div class="col-md-6 border-rounded">
                            <h5 class="text-center-bold-e">ENTRADAS</h5>

                            <!-- Días de la semana para entradas -->
                            <div class="row mb-3">

                                <!-- Lunes -->
                                <div class="col-md-3">
                                    <label for="ec_lunes" class="form-label-ds">L:</label>
                                    <input type="text" name="ec_lunes" id="ec_lunes" class="form-control entrada-semana" required>
                                    <span id="ec_lunesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Martes -->
                                <div class="col-md-3">
                                    <label for="ec_martes" class="form-label-ds">M:</label>
                                    <input type="text" name="ec_martes" id="ec_martes" class="form-control entrada-semana" required>
                                    <span id="ec_martesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Miercoles -->
                                <div class="col-md-3">
                                    <label for="ec_miercoles" class="form-label-ds">M:</label>
                                    <input type="text" name="ec_miercoles" id="ec_miercoles" class="form-control entrada-semana" required>
                                    <span id="ec_miercolesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Jueves -->
                                <div class="col-md-3">
                                    <label for="ec_jueves" class="form-label-ds">J:</label>
                                    <input type="text" name="ec_jueves" id="ec_jueves" class="form-control entrada-semana" required>
                                    <span id="ec_juevesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Viernes -->
                                <div class="col-md-4">
                                    <label for="ec_viernes" class="form-label-ds">V:</label>
                                    <input type="text" name="ec_viernes" id="ec_viernes" class="form-control entrada-semana" required>
                                    <span id="ec_viernesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Sábado -->
                                <div class="col-md-4">
                                    <label for="ec_sabado" class="form-label-ds">S:</label>
                                    <input type="text" name="ec_sabado" id="ec_sabado" class="form-control entrada-semana" required>
                                    <span id="ec_sabadoMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Domingo -->
                                <div class="col-md-4">
                                    <label for="ec_domingo" class="form-label-ds">D:</label>
                                    <input type="text" name="ec_domingo" id="ec_domingo" class="form-control entrada-semana" required>
                                    <span id="ec_domingoMensaje" class="mensaje-error"></span>
                                </div>

                            </div>
                        </div>

                        <!-- Salidas -->
                        <div class="col-md-6 border-rounded">
                            <h5 class="text-center-bold-s">SALIDAS</h5>

                            <!-- Días de la semana para salidas -->
                            <div class="row mb-3">

                                <!-- Lunes Salida -->
                                <div class="col-md-3">
                                    <label for="sc_lunes" class="form-label-ds">L:</label>
                                    <input type="text" name="sc_lunes" id="sc_lunes" class="form-control entrada-semana" required>
                                    <span id="sc_lunesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Martes Salida -->
                                <div class="col-md-3">
                                    <label for="sc_martes" class="form-label-ds">M:</label>
                                    <input type="text" name="sc_martes" id="sc_martes" class="form-control entrada-semana" required>
                                    <span id="sc_martesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Miércoles Salida -->
                                <div class="col-md-3">
                                    <label for="sc_miercoles" class="form-label-ds">M:</label>
                                    <input type="text" name="sc_miercoles" id="sc_miercoles" class="form-control entrada-semana" required>
                                    <span id="sc_miercolesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Jueves Salida -->
                                <div class="col-md-3">
                                    <label for="sc_jueves" class="form-label-ds">J:</label>
                                    <input type="text" name="sc_jueves" id="sc_jueves" class="form-control entrada-semana" required>
                                    <span id="sc_juevesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Viernes Salida -->
                                <div class="col-md-4">
                                    <label for="sc_viernes" class="form-label-ds">V:</label>
                                    <input type="text" name="sc_viernes" id="sc_viernes" class="form-control entrada-semana" required>
                                    <span id="sc_viernesMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Sábado Salida -->
                                <div class="col-md-4">
                                    <label for="sc_sabado" class="form-label-ds">S:</label>
                                    <input type="text" name="sc_sabado" id="sc_sabado" class="form-control entrada-semana" required>
                                    <span id="sc_sabadoMensaje" class="mensaje-error"></span>
                                </div>

                                <!-- Domingo Salida -->
                                <div class="col-md-4">
                                    <label for="sc_domingo" class="form-label-ds">D:</label>
                                    <input type="text" name="sc_domingo" id="sc_domingo" class="form-control entrada-semana" required>
                                    <span id="sc_domingoMensaje" class="mensaje-error"></span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Separador inferior después de los días de la semana (Viernes a Domingo) -->
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
            </div>

            </form>

        </div>

    </div>
</div>
</div>

<!-- Cargamos archivos CSS y JS -->
<link rel="stylesheet" href="vistas/css/modalagentbodega.css">
<script src="vistas/js/modalagentbodega.js"></script>

<!-- Script para cargar datos en el formulario de edición -->
<script>
    let editaModalCIG = document.getElementById('editaECocinaIG');
    editaModalCIG.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget;
        let id = button.getAttribute('data-bs-id');

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


        let url = "getCocinaIG.php";
        let formData = new FormData();
        formData.append('idcocina_inventario', id);

        fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                /* Asignamos si es correcto, asignamos los datos */
                inputIdC.value = data.idcocina_inventario
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

            }).catch(err => console.log(err));
    });
</script>