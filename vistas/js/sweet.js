function advertencia(e) {
    e.preventDefault();
    var url = e.currentTarget.getAttribute('href');
    Swal.fire({
        title: '¿Está seguro?',
        text: '¡No podrá recuperar este registro!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2CB073',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Salir',
        reverseButtons: true,
        padding: '20px',
        backdrop: true,
        position: 'top',
        allowOutsideClick: true,
        allowEscapeKey: true,
        allowEnterKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            // Mantén la funcionalidad existente para la eliminación en tu sistema
            // Almacena una cookie indicando que se ha eliminado el registro
            document.cookie = "registroEliminado=true; path=/";
            window.location.href = url;
        }
    });
}

// Verifica la cookie al cargar la página
window.onload = function () {
    var registroEliminado = getCookie("registroEliminado");
    if (registroEliminado === "true") {
        // Elimina la cookie
        document.cookie = "registroEliminado=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";

        // Muestra el Sweet Alert después de la recarga
        Swal.fire({
            title: "", // Título vacío
            html: "<div class='custom-content'><div class='custom-content-wrapper'><img src='vistas/iconos/svg/check2.svg' class='custom-checkmark' alt='checkmark'><span class='custom-title-class'>Hecho:</span><span class='custom-content-class'>Registro eliminado!</span></div></div>",
            position: 'top-end',
            timer: 3000,  // Muestra durante 3 segundos
            showConfirmButton: false, // Oculta el botón de confirmación
            showCancelButton: false, // Oculta el botón de cancelación
            customClass: {
                popup: 'custom-popup-class',
                closeButton: 'custom-close-button-class',
            },
            didOpen: () => {
                const closeButton = document.querySelector('.swal2-close');
                closeButton.classList.add('custom-close-button-class');
            },
        });
    }
};

// Función para obtener el valor de una cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
