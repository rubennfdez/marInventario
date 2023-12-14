/************************* Unidad de medida ******************************************************/

// Manejar el evento input en el campo de unidad de medida
/*document.getElementById('um').addEventListener('input', function (event) {
    var inputValue = this.value;

    // Verificar si el valor contiene números o caracteres especiales
    if (/[^a-zA-Z]/.test(inputValue)) {
        // Limpiar el campo y mostrar el mensaje de error
        this.value = inputValue.replace(/[^a-zA-Z]/g, ''); // Mantener solo letras
        document.getElementById('mensaje').textContent = 'Solo se permiten letras.';
    } else {
        // Limpiar el mensaje si es válido
        document.getElementById('mensaje').textContent = '';
    }

    // Convertir a mayúsculas
    this.value = this.value.toUpperCase();
}); */
/************************* Cantidad de entrada y Días de la semana ******************************************************/

function validarEntrada(inputElement, mensajeElement) {
    var inputValue = inputElement.value;
    var mensaje = ''; // Inicializar el mensaje

    // Verificar si el valor contiene letras o caracteres especiales
    if (/[^0-9.]/.test(inputValue)) {
        // Limpiar el campo y mostrar el mensaje de error
        inputElement.value = inputValue.replace(/[^0-9.]/g, ''); // Se mantienen solo números
        mensaje = 'Solo se permiten números y punto decimal.';
    } else {
        // Verificar si hay más de un punto decimal
        var dotCount = inputValue.split('.').length - 1;
        if (dotCount > 1) {
            inputElement.value = inputValue.slice(0, inputValue.lastIndexOf('.'));
            mensaje = 'Solo se permite un punto decimal';
        } else {
            // Verificar la cantidad de dígitos después del punto.
            var decimalDigits = inputValue.split('.')[1];
            if (decimalDigits && decimalDigits.length > 3) {
                inputElement.value = inputValue.slice(0, inputValue.indexOf('.') + 4);
                mensaje = 'Solo se permiten tres dígitos decimales';
            }
        }
    }

    // Actualizar el mensaje en el elemento correspondiente
    document.getElementById(mensajeElement).textContent = mensaje;
}

// Manejar el evento input en el campo de cantidad de entrada
document.getElementById('entradab').addEventListener('input', function(event) {
    validarEntrada(this, 'numMensaje');
});

// Llamada a la función para actualizar el mensaje después de modificar el valor programáticamente
validarEntrada(document.getElementById('entradab'), 'numMensaje');

// Obtener todos los elementos de entrada de los días de la semana
var diasDeLaSemana = document.querySelectorAll('.entrada-semana');

diasDeLaSemana.forEach(function(inputElement) {
    var mensajeElement = inputElement.id + 'Mensaje';

    // Manejar el evento input en el campo de cantidad de entrada
    inputElement.addEventListener('input', function(event) {
        validarEntrada(inputElement, mensajeElement);
    });

    // Manejar el evento keydown en el campo de cantidad de entrada
    inputElement.addEventListener('keydown', function(event) {
        var inputValue = this.value;
        var keyCode = event.which || event.keyCode;

        // Verificar si la tecla presionada es el guion y si hay un punto decimal en el valor actual.
        if (keyCode === 189 && inputValue.includes('.')) {
            event.preventDefault();
        }
    });
});

/*******************************************************************************/