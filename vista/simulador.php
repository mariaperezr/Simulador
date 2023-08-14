<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador Bancario</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Simulador Bancario</title>
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
    <script src="js/simulador.js"></script>
   
</head>
<body>

<!-- A partir de aquí, el contenido específico para el usuario cliente -->
<div class="cerrar">
    <a class="cerrarSesion" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>
    <h2>Simulador Bancario</h2>
</div>

    <!-- Formulario para Simulador de Crédito de Libre Inversión -->
    <form id="simuladorLibreInversion">
        <h2>Ingreso Datos - Crédito de Libre Inversión</h2>
        <div class="inputBox">
            <label for="valor">Valor de la Solicitud:</label>
            <input type="number" name="valor" id="valor" min="1000000" max="25000000" required>
        </div>
        <div class="inputBox">
            <label for="plazo">Plazo (meses):</label>
            <select name="plazo" id="plazo">
                <option value="6">6 meses</option>
                <option value="24">24 meses</option>
                <option value="46">46 meses</option>
                <option value="60">60 meses</option>
            </select>
        </div>
        <div class="inputBox">
            <label for="tasa_interes">Tasa de Interés (%):</label>
            <input type="number" name="tasa_interes" id="tasa_interes" min="0" required>
        </div>
        <div class="buttons">
        <input type="submit" value="CALCULAR CRÉDITO DE LIBRE INVERSIÓN">
        </div>
        </form>

        <div class="inputBox">
    <label for="cuota_mensual">Cuota Mensual:</label>
    <input type="text" name="cuota_mensual" id="cuota_mensual" readonly>

<!-- Formulario para Simulador Crédito Hipotecario -->
<form id="simuladorHipotecario">
    <h2>Ingreso Datos - Crédito Hipotecario</h2>
    <div class="inputBox">
        <label for="valor_hipotecario">Valor de la Propiedad:</label>
        <input type="number" name="valor_hipotecario" id="valor_hipotecario" min="1000000" max="500000000" required>
    </div>
    <div class="inputBox">
        <label for="plazo_hipotecario">Plazo (años):</label>
        <select name="plazo_hipotecario" id="plazo_hipotecario">
            <option value="15">15 años</option>
            <option value="20">20 años</option>
            <option value="25">25 años</option>
            <option value="30">30 años</option>
        </select>
    </div>
    <div class="inputBox">
        <label for="tasa_interes_hipotecario">Tasa de Interés (%):</label>
        <input type="number" name="tasa_interes_hipotecario" id="tasa_interes_hipotecario" min="0" required>
    </div>
    
    <div class="buttons">
        <input type="submit" name="calcularSimulacionHipotecario" value="CALCULAR CRÉDITO HIPOTECARIO">
    </div>
</form>
<div class="inputBox">
        <label for="cuota_mensual_hipotecario">Cuota Mensual Hipotecario:</label>
        <input type="text" name="cuota_mensual_hipotecario" id="cuota_mensual_hipotecario" readonly>
    </div>



<!-- Elemento para mostrar la respuesta de la solicitud -->
<div id="respuesta"></div>

</body>
</html>
