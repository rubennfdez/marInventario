
function Eliminar(id_categoria) {
    $.ajax({
        url: url,
        data: { "id_categoria": id_categoria, "accion": "ELIMINAR" },
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Éxito!", "Datos eliminados con éxito", "success");
        } else {
            MostrarAlerta("Error!", response, "error");
        }
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}