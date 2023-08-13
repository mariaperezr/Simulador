

<?php

include_once "Conexion.php";

class SimuladorModelo {

    // Función para listar todas las simulaciones
    public static function mdlListarSimulaciones() {
        $listarSimulaciones = "";

        try {
            $respuestaSimulaciones = Conexion::conectar()->prepare("SELECT * FROM simulaciones");
            $respuestaSimulaciones->execute();
            $listarSimulaciones = $respuestaSimulaciones->fetchAll();
            $respuestaSimulaciones = null;

        } catch (Exception $error) {
            $listarSimulaciones = $error;
        }

        return $listarSimulaciones;
    }

    // Función para guardar una nueva simulación
    public static function mdlGuardarSimulacion($tipo_simulacion, $valor, $plazo, $tasa_interes, $cuota_mensual, $usuario_id) {
        $mensaje = "";

        try {
            $respuestaSimulacion = Conexion::conectar()->prepare("INSERT INTO simulaciones(tipo_simulacion, valor, plazo, tasa_interes, cuota_mensual, usuario_id) VALUES(:tipo_simulacion, :valor, :plazo, :tasa_interes, :cuota_mensual, :usuario_id)");
            $respuestaSimulacion->bindParam(":tipo_simulacion", $tipo_simulacion);
            $respuestaSimulacion->bindParam(":valor", $valor);
            $respuestaSimulacion->bindParam(":plazo", $plazo);
            $respuestaSimulacion->bindParam(":tasa_interes", $tasa_interes);
            $respuestaSimulacion->bindParam(":cuota_mensual", $cuota_mensual);
            $respuestaSimulacion->bindParam(":usuario_id", $usuario_id);

            if ($respuestaSimulacion->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "Error al guardar la simulación";
            }

        } catch (Exception $error) {
            $mensaje = $error;
        }

        return $mensaje;
    }

    // Función para actualizar una simulación existente
    public static function mdlActualizarSimulacion($id_simulacion, $tipo_simulacion, $valor, $plazo, $tasa_interes, $cuota_mensual, $usuario_id) {
        $mensaje = "";

        try {
            $respuestaSimulacion = Conexion::conectar()->prepare("UPDATE simulaciones SET tipo_simulacion = :tipo_simulacion, valor = :valor, plazo = :plazo, tasa_interes = :tasa_interes, cuota_mensual = :cuota_mensual, usuario_id = :usuario_id WHERE id = :id_simulacion");
            $respuestaSimulacion->bindParam(":tipo_simulacion", $tipo_simulacion);
            $respuestaSimulacion->bindParam(":valor", $valor);
            $respuestaSimulacion->bindParam(":plazo", $plazo);
            $respuestaSimulacion->bindParam(":tasa_interes", $tasa_interes);
            $respuestaSimulacion->bindParam(":cuota_mensual", $cuota_mensual);
            $respuestaSimulacion->bindParam(":usuario_id", $usuario_id);
            $respuestaSimulacion->bindParam(":id_simulacion", $id_simulacion);

            if ($respuestaSimulacion->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "Error al actualizar la simulación";
            }

        } catch (Exception $error) {
            $mensaje = $error;
        }

        return $mensaje;
    }

    // Función para eliminar una simulación
    public static function mdlEliminarSimulacion($id_simulacion) {
        $mensaje = "";

        try {
            $respuestaSimulacion = Conexion::conectar()->prepare("DELETE FROM simulaciones WHERE id = :id_simulacion");
            $respuestaSimulacion->bindParam(":id_simulacion", $id_simulacion);

            if ($respuestaSimulacion->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "Error al eliminar la simulación";
            }

        } catch (Exception $error) {
            $mensaje = $error;
        }

        return $mensaje;
    }
}