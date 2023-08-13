$(document).ready(function() {

    $("#formRegistro").submit(function(event) { 
        event.preventDefault();
        
        // Obtener el valor seleccionado del campo de tipo de usuario
        var tipoUsuario = $("select[name=guardartipoUsuario]").val();

        // Crear un objeto con los datos del formulario, incluyendo el tipo de usuario
        var formDataRegistro = {
            guardarCorreo: $("#correoregistroid").val(),
            guardarContrasena: $("#contrasenaregistroid").val(),
            guardartipoUsuario: tipoUsuario  // Agregar el tipo de usuario al objeto
        };
        

        console.log(formDataRegistro);
        // Realizar la petición AJAX con los datos del formulario
        $.ajax({
            url: "../controlador/usuarioControlador.php",
            type: "POST",
            dataType: "json",
            data: formDataRegistro,
        }).done(function (respuesta) {
            console.log(respuesta);
            $("#correoregistroid").val("");
            $("#contrasenaregistroid").val(""); // Limpiar el campo de contraseña

            alert("Usuario creado satisfactoriamente ");
            
            $("#boxIngreso").show();
            $("#boxRegistro").hide();
        }).fail(function (xhr, status, error) {
            // Manejar el error en caso de que falle la petición AJAX
            console.log(xhr, status, error);
        });
    });

});
//Con estos cambios, el archivo usuario.js captura correctamente el valor seleccionado del campo de tipo de usuario y lo incluye en la petición AJAX al enviar el formulario de registro al controlador ctrUsuario. De esta manera, el tipo de usuario se enviará correctamente junto con el correo y la contraseña al guardar un nuevo usuario en la base de datos.





