var usuarioExiste = false;
var emailExiste = false;

//Validar Usuario Unico con Ajax///
$("#nombreRegistro").change(function () {
    var usuario = $("#nombreRegistro").val();
    var datos = new FormData();
    datos.append('varusuario', usuario);

    $.ajax({
        url: 'http://localhost/proyectoseguridad/views/modules/ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == 1) {
                usuarioExiste = true;
                $("#error-nombre").html('Este Usuario ya Existe');
            }
            else {
                $("#error-nombre").html('');
                usuarioExiste = false;
            }
        }
    });
});

///Validar Email Unico con Ajax//
$("#emailRegistro").change(function () {
    var email = $("#emailRegistro").val();
    var dato = new FormData();
    dato.append('email', email);
    $.ajax({
        url: 'http://localhost/proyectoseguridad/views/modules/ajax.php',
        method: 'POST',
        data: dato,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == 1) {
                emailExiste = true;
                $("#error-email").html('Este Correo Electronico ya Existe');
            }
            else {
                emailExiste = false;
                $("#error-email").html('');
            }
        }
    });
});


///Funcion Validar Registro Usuario///
function validarRegistroUsuario() {
    var nombre = document.querySelector('#nombreRegistro');
    var email = document.querySelector('#emailRegistro');
    var clave = document.querySelector('#claveRegistro');
    var terminos = document.querySelector('#terminos');

    var expresion = /^[a-zA-Z0-9]+$/;
    var patronClave = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    var patronEmail = /^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/;

    ///Validar Nombre Usuario///
    if (nombre.value.trim() !== '') {
        if (nombre.value.length > 10) {
            document.querySelector('#error-nombre').innerHTML += "¡Por Favor Digite Maximo 10 Caracteres!";
            return false;
        }
        if (!expresion.test(nombre.value)) {
            document.querySelector('#error-nombre').innerHTML += "¡Por Favor Digite Solo Letras o Numeros!";
            return false;
        }
    }

    ///Validar Contraseña del Usuario///
    if (clave.value.trim() !== '') {
        if (!patronClave.test(clave.value)) {
            document.querySelector('#error-clave').innerHTML =
                "¡La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número!";
            return false;
        }
    }

    ///Validar Email///
    if (!patronEmail.test(email.value)) {
        document.querySelector('#error-email').innerHTML = "¡Ingrese un correo válido!";
        return false;
    }

    ///Validar Terminos y condiciones///
    if (!terminos.checked) {
        document.querySelector("#error-terminos").innerHTML = "Debe Aceptar los Términos y Condiciones";
        document.querySelector('#nombreRegistro') = nombre;
        document.querySelector('#emailRegistro') = email;
        return false;
    }
    if(usuarioExiste){
        return false;
    }
    if(emailExiste){
        return false;
    }
    return true;
}
///Fin Funcion Validar Registro Usuario///
