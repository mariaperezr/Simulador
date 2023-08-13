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