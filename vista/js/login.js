$(document).ready(function() {

    $("#registro").on("click", function() {
        $("#boxIngreso").hide();
        $("#boxRegistro").fadeIn(1000);
        $("#correoregistroid").val("");
        $("#contrasenaregistroid").val(""); // Limpiar el campo de contraseña
    });
    
    $("#ingresarlogin").on("click", function() {
        $("#boxIngreso").show();
        $("#boxRegistro").hide();
        $("#correoregistroid").val("");
        $("#contrasenaregistroid").val(""); // Limpiar el campo de contraseña
    });
    $("#formLogin").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "../controlador/usuarioControlador.php", 
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.hasOwnProperty('tipo_usuario')) {
                    console.log(response.tipo_usuario);
                    // Redireccionar al dashboard según el tipo de usuario
                    window.location.href = determineDashboard(response.tipo_usuario);
                } else {
                    alert("Usuario o contraseña incorrectos");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error); // Imprimir el error en la consola para depurar
                alert("Error al procesar la solicitud");
            }
        });
    });
    function determineDashboard(tipoUsuario) {

        console.log(tipoUsuario);
        switch (tipoUsuario) {
            case "Administrador":
                return "../vista/administrador.php";
            case "Usuario":
                return "../vista/usuario.php";
            default:
                return "../vista/index.php";
        }
    }

});
