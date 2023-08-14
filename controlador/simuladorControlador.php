<?php

include_once "../Modelo/SimuladorModelo.php";

class SimuladorControlador {

    // Función para listar todas las simulaciones
    public function ctrListarSimulaciones() {
        $respuestaSimulaciones = SimuladorModelo::mdlListarSimulaciones();
        echo json_encode($respuestaSimulaciones);
    }

    // Función para guardar una nueva simulación
    public function ctrGuardarSimulacion($tipo_simulacion, $valor, $plazo, $tasa_interes, $cuota_mensual, $usuario_id) {
        $respuestaSimulacion = SimuladorModelo::mdlGuardarSimulacion($tipo_simulacion, $valor, $plazo, $tasa_interes, $cuota_mensual, $usuario_id);
        echo json_encode($respuestaSimulacion);
    }

    // Función para actualizar una simulación existente
    public function ctrActualizarSimulacion($id_simulacion, $tipo_simulacion, $valor, $plazo, $tasa_interes, $cuota_mensual, $usuario_id) {
        $respuestaSimulacion = SimuladorModelo::mdlActualizarSimulacion($id_simulacion, $tipo_simulacion, $valor, $plazo, $tasa_interes, $cuota_mensual, $usuario_id);
        echo json_encode($respuestaSimulacion);
    }

    // Función para eliminar una simulación
    public function ctrEliminarSimulacion($id_simulacion) {
        $respuestaSimulacion = SimuladorModelo::mdlEliminarSimulacion($id_simulacion);
        echo json_encode($respuestaSimulacion);
    }

    public function ctrCalcularSimulacionLibreInversion($valor, $plazo, $tasa_interes) {
        // Realizar los cálculos necesarios para el Crédito de Libre Inversión
        $tasaInteresMensual = $tasa_interes / 100 / 12;
        $cuotaMensual = ($valor * $tasaInteresMensual) / (1 - pow(1 + $tasaInteresMensual, -$plazo));
        
        // Crear un arreglo con los resultados
        $resultados = array(
            "tipo_simulacion" => "CreditoLibreInversion",
            "valor" => $valor,
            "plazo" => $plazo,
            "tasa_interes" => $tasa_interes,
            "cuota_mensual" => $cuotaMensual
        );

        // Retorna el resultado en formato JSON
        echo json_encode($resultados);
    }


    public function ctrCalcularSimulacionHipotecario($valorHipotecario, $plazoHipotecario, $tasa_interes_hipotecario) {
        // Realizar los cálculos necesarios para el Crédito Hipotecario
        $tasaInteresMensualHipotecario = $tasa_interes_hipotecario / 100 / 12;
        $cuotaMensualHipotecario = ($valorHipotecario * $tasaInteresMensualHipotecario) / (1 - pow(1 + $tasaInteresMensualHipotecario, -$plazoHipotecario * 12));
    
        // Crear un arreglo con los resultados
        $resultadosHipotecario = array(
            "tipo_simulacion" => "CreditoHipotecario",
            "valor_hipotecario" => $valorHipotecario,
            "plazo_hipotecario" => $plazoHipotecario,
            "tasa_interes_hipotecario" => $tasa_interes_hipotecario,
            "cuota_mensual_hipotecario" => $cuotaMensualHipotecario
        );
    
        // Retorna el resultado en formato JSON sin agregar espacios en blanco
        echo json_encode($resultadosHipotecario, JSON_UNESCAPED_UNICODE);
    }

}


// Verificar si se ha enviado el formulario para calcular una simulación de Crédito de Libre Inversión
if (isset($_POST["calcularSimulacionLibreInversion"])) {
    $objSimulador = new SimuladorControlador();
    $valor = floatval($_POST["valor"]);
    $plazo = intval($_POST["plazo"]);
    $tasa_interes = floatval($_POST["tasa_interes"]);

    $resultado = $objSimulador->ctrCalcularSimulacionLibreInversion($valor, $plazo, $tasa_interes);
    echo $resultado;
}


if (isset($_POST["calcularSimulacionHipotecario"])) {
    $objSimulador = new SimuladorControlador();
    $valorHipotecario = floatval($_POST["valor_hipotecario"]);
    $plazoHipotecario = intval($_POST["plazo_hipotecario"]);
    $tasa_interes_hipotecario = floatval($_POST["tasa_interes_hipotecario"]);

    $resultadoHipotecario = $objSimulador->ctrCalcularSimulacionHipotecario($valorHipotecario, $plazoHipotecario, $tasa_interes_hipotecario);
    echo $resultadoHipotecario; // Retorna el resultado en formato JSON
}

// Verificar si se ha enviado el formulario para guardar una simulación
if (isset($_POST["guardarSimulacion"])) {
    $objSimulador = new SimuladorControlador();
    $objSimulador->ctrGuardarSimulacion($_POST["tipo_simulacion"], $_POST["valor"], $_POST["plazo"], $_POST["tasa_interes"], $_POST["cuota_mensual"], $_POST["usuario_id"]);
}

// Verificar si se ha enviado el formulario para actualizar una simulación
if (isset($_POST["actualizarSimulacion"])) {
    $objSimulador = new SimuladorControlador();
    $objSimulador->ctrActualizarSimulacion($_POST["id_simulacion"], $_POST["tipo_simulacion"], $_POST["valor"], $_POST["plazo"], $_POST["tasa_interes"], $_POST["cuota_mensual"], $_POST["usuario_id"]);
}

// Verificar si se ha enviado el formulario para eliminar una simulación
if (isset($_POST["eliminarSimulacion"])) {
    $objSimulador = new SimuladorControlador();
    $objSimulador->ctrEliminarSimulacion($_POST["eliminarSimulacion"]);
}

// Verificar si se ha enviado la solicitud para listar las simulaciones
if (isset($_POST["listarSimulaciones"])) {
    $objSimulador = new SimuladorControlador();
    $objSimulador->ctrListarSimulaciones();
}