$(document).ready(function() {

    $("#formularioSimulador").submit(function(event) {
        event.preventDefault();

        // Obtener los valores ingresados en el formulario
        var tipoSimulacion = $("#tipo_simulacion").val();
        var valor = $("#valor").val();
        var plazo = $("#plazo").val();

        // Crear un objeto con los datos del formulario
        var formData = {
            tipo_simulacion: tipoSimulacion,
            valor: valor,
            plazo: plazo
        };

        // Realizar la petición AJAX con los datos del formulario
        $.ajax({
            url: "../controlador/simuladorControlador.php", // Ruta del controlador para guardar la simulación
            type: "POST",
            dataType: "json",
            data: formData,
        }).done(function (respuesta) {
            // Manejar la respuesta del servidor
            console.log(respuesta);

            // Limpiar los campos del formulario
            $("#tipo_simulacion").val("");
            $("#valor").val("");
            $("#plazo").val("");

            // Mostrar mensaje de éxito o error
            if (respuesta === "ok") {
                $("#respuesta").text("Simulación guardada exitosamente.");
            } else {
                $("#respuesta").text("Error al guardar la simulación. Inténtalo nuevamente.");
            }
        }).fail(function (xhr, status, error) {
            // Manejar el error en caso de que falle la petición AJAX
            console.log(xhr, status, error);
        });
    });

});