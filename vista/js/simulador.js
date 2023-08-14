$(document).ready(function() {
    console.log("ready!!");

    $("#simuladorLibreInversion").submit(function(event) {
        event.preventDefault();

        // Obtener los valores ingresados en el formulario de Crédito de Libre Inversión
        var tipoSimulacion = $("#tipo_simulacion").val();
        var valor = $("#valor").val();
        var plazo = $("#plazo").val();
        var tasaInteres = $("#tasa_interes").val();

        var formDataLibreInversion = {
            calcularSimulacionLibreInversion: true,
            tipo_simulacion: tipoSimulacion,
            valor: valor,
            plazo: plazo,
            tasa_interes: tasaInteres
        };

        // Realizar la petición AJAX con los datos del formulario para calcular la simulación de Crédito de Libre Inversión
        $.ajax({
            url: "../controlador/simuladorControlador.php",
            type: "POST",
            dataType: "json",
            data: formDataLibreInversion,
        }).done(function(respuesta) {
            // Manejar la respuesta del servidor
            console.log(respuesta);
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })

            // Mostrar los resultados en el formulario
            $("#cuota_mensual").val(respuesta.cuota_mensual.toFixed(2));

            // Realizar la petición AJAX para guardar la simulación de Crédito de Libre Inversión en la base de datos
            $.ajax({
                url: "../controlador/simuladorControlador.php",
                type: "POST",
                dataType: "json",
                data: {
                    guardarSimulacion: true,
                    tipo_simulacion: tipoSimulacion,
                    valor: valor,
                    plazo: plazo,
                    tasa_interes: tasaInteres,
                    cuota_mensual: respuesta.cuota_mensual,
                    usuario_id: 1 // Reemplaza con el ID de usuario correspondiente
                },
            }).done(function(guardarResultado) {
                // Manejar la respuesta del servidor al guardar la simulación de Crédito de Libre Inversión
                console.log(guardarResultado);
                $("#respuesta").text("Simulación de Crédito de Libre Inversión guardada exitosamente.");
            }).fail(function(xhr, status, error) {
                // Manejar el error en caso de que falle la petición AJAX
                console.log(xhr, status, error);
                $("#respuesta").text("Error al guardar la simulación de Crédito de Libre Inversión. Inténtalo nuevamente.");
            });
        }).fail(function(xhr, status, error) {
            // Manejar el error en caso de que falle la petición AJAX
            console.log(xhr, status, error);
        });
    });

    $("#simuladorHipotecario").submit(function(event) {
        event.preventDefault();

        // Obtener los valores ingresados en el formulario de Crédito Hipotecario
        var valorHipotecario = $("#valor_hipotecario").val();
        var plazoHipotecario = $("#plazo_hipotecario").val();
        var tasaInteresHipotecario = $("#tasa_interes_hipotecario").val();

        // Verificar que los campos del formulario de Crédito Hipotecario estén llenos
        if (valorHipotecario === "" || plazoHipotecario === "" || tasaInteresHipotecario === "") {
            alert("Por favor, complete todos los campos del formulario de Crédito Hipotecario.");
            return;
        }

        var formDataHipotecario = {
            calcularSimulacionHipotecario: true,
            valor_hipotecario: valorHipotecario,
            plazo_hipotecario: plazoHipotecario,
            tasa_interes_hipotecario: tasaInteresHipotecario
        };

        // Realizar la petición AJAX con los datos del formulario para calcular la simulación de Crédito Hipotecario
        $.ajax({
            url: "../controlador/simuladorControlador.php",
            type: "POST",
            dataType: "json",
            data: formDataHipotecario,
        }).done(function(respuestaHipotecario) {
            // Manejar la respuesta del servidor
            console.log(respuestaHipotecario);

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })

            // Mostrar los resultados en el formulario
            $("#cuota_mensual_hipotecario").val(respuestaHipotecario.cuota_mensual_hipotecario.toFixed(2));

            // Realizar la petición AJAX para guardar la simulación de Crédito Hipotecario en la base de datos
            $.ajax({
                url: "../controlador/simuladorControlador.php",
                type: "POST",
                dataType: "json",
                data: {
                    guardarSimulacion: true,
                    tipo_simulacion: "CreditoHipotecario",
                    valor: valorHipotecario,
                    plazo: plazoHipotecario,
                    tasa_interes: tasaInteresHipotecario,
                    cuota_mensual: respuestaHipotecario.cuota_mensual_hipotecario,
                    usuario_id: 1 // Reemplaza con el ID de usuario correspondiente
                },
            }).done(function(guardarResultado) {
                // Manejar la respuesta del servidor al guardar la simulación de Crédito Hipotecario
                console.log(guardarResultado);
                $("#respuesta").text("Simulación de Crédito Hipotecario guardada exitosamente.");
            }).fail(function(xhr, status, error) {
                // Manejar el error en caso de que falle la petición AJAX
                console.log(xhr, status, error);
                $("#respuesta").text("Error al guardar la simulación de Crédito Hipotecario. Inténtalo nuevamente.");
            });
        }).fail(function(xhr, status, error) {
            // Manejar el error en caso de que falle la petición AJAX
            console.log(xhr, status, error);
        });
    });
});
