<?php



/* se conecta con la base de datos  por lo cual  todos los metodos del modelo tienen una sentencia sql ( slect , insert , update ) */ 
include_once "conexion.php";

class mdlUsuario{

    public static function mdlGuardarUsuario($Correo, $Contrasena, $TipoUsuario) {
        $GuardarUsuario = "";
    
        //cifrar antes de guardar en la base de datos
        $password_cifrado = password_hash($Contrasena, PASSWORD_DEFAULT);
    
        try {
            $respuestaUsuario = conexion::conectar()->prepare("INSERT INTO usuarios(correo, contrasena, tipo_usuario) VALUES (:Correo, :Contrasena, :TipoUsuario)");
            $respuestaUsuario->bindParam(":Correo", $Correo);
            $respuestaUsuario->bindParam(":Contrasena", $password_cifrado);
            $respuestaUsuario->bindParam(":TipoUsuario", $TipoUsuario); // Agrega el tipo de usuario al insert
    
            if ($respuestaUsuario->execute()) {
                $GuardarUsuario = "ok";
            } else {
                $GuardarUsuario = "Error al registrar el usuario";
            }
        } catch (Exception $error) {
            $GuardarUsuario = $error;
        }
        return $GuardarUsuario;
    }

    // Función para iniciar sesión
    public static function mdlIniciarSesion($correo, $password) {
        try {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE correo = :correo");
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['contrasena'])) {
                return $usuario;
            } else {
                return false;
            }
        } catch (Exception $error) {
            return false;
        }
    }
}