// Elimina todos los registros de la tabla BODEGA
function eliminarTodosBodega(e) {
    e.preventDefault();
    var url = e.currentTarget.getAttribute('href');
    // Muestra una confirmación antes de eliminar
    Swal.fire({
        title: '¿Está seguro?',
        text: '¡Todos los registros de la tabla BODEGA serán eliminados!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2CB073',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar todos',
        cancelButtonText: 'Cancelar',
        reverseButtons: true,
        padding: '20px',
        backdrop: true,
        position: 'top',
        allowOutsideClick: true,
        allowEscapeKey: true,
        allowEnterKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            // Envia una solicitud AJAX para eliminar los registros
            $.ajax({
                url: 'eliminarTodosBodega.php',
                method: 'POST',
                data: {
                    tabla: 'inventario_bodega'
                },
                success: function (response) {
                    response = JSON.parse(response);

                    if (response.success) {
                        // Muestra la notificación de eliminación exitosa
                        mostrarNotificacion();
                    } else {
                        // Muestra una alerta de error
                        mostrarAlertaError(response.message);
                    }
                },
                error: function (error) {
                    // Muestra una alerta de error genérico
                    mostrarAlertaError('Error en la solicitud AJAX');
                }
            });
        }
    });
}

// Función para mostrar la notificación de eliminación exitosa
function mostrarNotificacion() {
    Swal.fire({
        title: '',
        html: "<div class='custom-content'><div class='custom-content-wrapper'><img src='vistas/iconos/svg/check2.svg' class='custom-checkmark' alt='checkmark'><span class='custom-title-class'>Hecho:</span><span class='custom-content-class'>Tabla 'Bodega' eliminada!</span></div></div>",
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false,
        showCancelButton: false,
        customClass: {
            popup: 'custom-popup-class-general',
            closeButton: 'custom-close-button-class',
        },
        didOpen: () => {
            const closeButton = document.querySelector('.swal2-close');
            closeButton.classList.add('custom-close-button-class');
        },
    }).then(() => {
        // Recarga la página después de que se muestra la notificación
        location.reload();
    });
}


// Función para mostrar una alerta de error
function mostrarAlertaError(mensaje) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: mensaje
    });
}
