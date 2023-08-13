<?php
class ctrValidarSesion {
    public static function validarSesion() {
        session_start();

        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            // Si el usuario no ha iniciado sesión, redirige al login
            header("Location: ../vista/login.php");
            exit;
        }

        // Aquí se puede agregar más lógica para validar el tipo de usuario
        if ($_SESSION['tipoUsuario'] === 'Administrador') {
            // Si es Vendedor, permite cargar la vista vendedor.php
            if (basename($_SERVER['PHP_SELF']) !== 'administrador.php') {
                header("Location: ../vista/administrador.php");
                exit;
            }
        } elseif ($_SESSION['tipoUsuario'] === 'Usuario') {
            // Si es Cliente, permite cargar la vista cliente.php
            if (basename($_SERVER['PHP_SELF']) !== 'usuario.php') {
                header("Location: ../vista/usuario.php");
                exit;
            }
        }  else {
            // Si no se reconoce el tipo de usuario, redirige a una página de error o a otra vista genérica
            header("Location: ../vista/login.php");
            exit;
        }
    }
}