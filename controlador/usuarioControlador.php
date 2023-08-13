<?php 

include_once "../modelo/usuarioModelo.php";

class ctrUsuario{

    public $idUsuarioContralador;
    public $CorreoContralador;
    public $ContrasenaControlador;
    public $TipoUsuarioControlador;  // Nuevo campo para la contraseña

    public function ctrGuardarUsuario() {
        $respuestaUsuarioM = mdlUsuario::mdlGuardarUsuario($this->CorreoContralador, $this->ContrasenaControlador, $this->TipoUsuarioControlador);// tener en cuenta que estemos enviando los mismos  atributos que los que recibimos en  el modelo
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrIniciarSesion($correoIniciarSesion, $contrasenaIniciarSesion) {
        $usuario = MdlUsuario::mdlIniciarSesion($correoIniciarSesion, $contrasenaIniciarSesion);
    
        if ($usuario) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['idUsuario'] = $usuario['id_usuario'];
            $_SESSION['tipoUsuario'] = $usuario['tipo_usuario'];
    
            echo json_encode($usuario);
        } else {
            echo json_encode("Usuario o contraseña incorrectos");
        }
    }
}


// entrada o la peticion desde el ajax  
// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST["correoFrm"], $_POST["contrasenaFrm"])) {
    $objUsuario = new CtrUsuario();
    $objUsuario->ctrIniciarSesion($_POST["correoFrm"], $_POST["contrasenaFrm"]); // Corregimos el nombre de los campos
}


if (isset($_POST["guardarCorreo"], $_POST["guardarContrasena"],$_POST["guardartipoUsuario"])) {
    $objUsuario = new ctrUsuario();
    $objUsuario->CorreoContralador = $_POST["guardarCorreo"];
    $objUsuario->ContrasenaControlador = $_POST["guardarContrasena"]; 
    $objUsuario->TipoUsuarioControlador = $_POST["guardartipoUsuario"]; 
    $objUsuario->ctrGuardarUsuario();
}

