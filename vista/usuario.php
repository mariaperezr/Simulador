<?php
include_once "../controlador/validarSesionControlador.php";
ctrValidarSesion::validarSesion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador Bancario</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Evaluacion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='js/login.js'></script>
    
</head>
<body>

<!-- A partir de aquí, el contenido específico para el usuario cliente -->
<h1>Bienvenido, Usuario!</h1>
<p>Aquí va el contenido que deseas mostrar al usuario cliente</p>
<a href="../controlador/cerrarSesion.php">Cerrar Sesión</a>
    <h1>Simulador Bancario</h1>
    <h2>Solicitud de Si</h2>
    <form id="formularioSimulador">
        <label for="tipo_simulacion">Tipo de Simulador:</label>
        <select name="tipo_simulacion" id="tipo_simulacion">
            <option value="CreditoLibreInversion">Crédito de Libre Inversión</option>
            <option value="CreditoHipotecario">Crédito Hipotecario</option>
        </select>
        <br>
        <label for="valor">Valor de la Solicitud:</label>
        <input type="number" name="valor" id="valor" min="1000000" max="25000000" required>
        <br>
        <label for="plazo">Plazo (meses):</label>
        <select name="plazo" id="plazo">
            <option value="6">6 meses</option>
            <option value="24">24 meses</option>
            <option value="46">46 meses</option>
            <option value="60">60 meses</option>
        </select>
        <br>
        <input type="submit" value="Solicitar Simulador">
    </form>

    <!-- Elemento para mostrar la respuesta de la solicitud -->
    <div id="respuesta"></div>
    <script src="js/simulador.js"></script>
</body>
</html>