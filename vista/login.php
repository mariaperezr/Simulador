<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="css/main.css">
    <script src="./js/login.js"></script>
    <script src="./js/usuario.js"></script> 
    <title>Iniciar Sesion</title>
</head>
<body>
    <div id="boxIngreso" class="box" >
        <span class="liner"></span>
        <form id="formLogin">
            <h2>INICIAR SESIONnn</h2>
            <div class="inputBox">
                <span>Usuario:</span>
                <input id="correoidfrm"  name="correoFrm"  type="email" required="required">
            </div>
            <div class="inputBox">
                <span>Contraseña:</span>
                <input id="contrasenaidfrm" name="contrasenaFrm"  type="password" required="required">
            </div>
            <div class="buttons">
                <input id="ingresar" type="submit" value="INGRESAR">
                <input id="registro" type="button" value="REGISTRAR">
            </div>
        </form>
    </div>

    <div id="boxRegistro" class="boxRegistro" style="display: none;">
    <span class="liner"></span>
    <form id="formRegistro">
        <h2>REGISTRARME</h2>
        <div class="inputBox">
            <span>Email:</span>
            <input id="correoregistroid" name="guardarCorreo" type="email" required="required">
        </div>
        <div class="inputBox">
            <span>Contraseña:</span>
            <input id="contrasenaregistroid" name="guardarContrasena" type="password" required="required">
        </div>
        <!-- Agregar campo de selección para el tipo de usuario -->
        <div class="inputBox">
            <span>Tipo de Usuario:</span>
            <select name="guardartipoUsuario" required="required">
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
        </div>
        <div class="buttons">
            <input id="registrar" type="submit" value="REGISTRARME">
            <input id="ingresarlogin" type="button" value="INGRESAR">
        </div>
    </form>
</div>>

    <div class="imagen">
        <img src="../img/papas.png">
    </div>
    
</body>
</html>