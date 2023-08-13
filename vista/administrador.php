<?php
include_once "../controlador/validarSesionControlador.php";
ctrValidarSesion::validarSesion();
?>

<!-- A partir de aquí, el contenido específico para el usuario cliente -->
<h1>Bienvenido, Adminitrador!</h1>
<p>Aquí va el contenido que deseas mostrar al usuario cliente</p>
<a href="../controlador/cerrarSesion.php">Cerrar Sesión</a>