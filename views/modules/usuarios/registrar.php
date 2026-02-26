<?php
session_start();
/*if (!$_SESSION['usuarioValido']) {
    header('location:'. BASE_URL .'inicio');
}*/
$usuarioControlador = new UsuarioController();
$usuarioControlador->registrarUsuarioControlador();
?>
<div class="container">
    <div class="row">
        Usuario: <?php isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : 'Usuario No Registrado' ?>
    </div>
    <form method="post" onsubmit="return validarRegistroUsuario()">
        <fieldset>
            <legend>Registrar Usuarios</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nombreRegistro" class="form-label">Nombre de Usuario</label>
                        <input type="text" id="nombreRegistro" name="nombreRegistro" maxlength="10" class="form-control" placeholder="Ingrese Maximo 10 Caracteres" required>
                        <div id="error-nombre" style="color:red; font: size 10px;"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="emailRegistro" class="form-label">Email o Correo Electronico</label>
                        <input type="email" id="emailRegistro" name="emailRegistro" class="form-control" placeholder="Ingrese un Email Valido" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                        <div id="error-email" style="color:red; font: size 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="claveRegistro" class="form-label">Contraseña de Usuario</label>
                        <input type="password" id="claveRegistro" name="claveRegistro" minlength="6" class="form-control" placeholder="Ingrese Minimo 6 Caracteres" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres." required>
                        <div id="error-clave" style="color:red; font: size 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terminos" name="terminos">
                        <label class="form-check-label" for="terminos">
                            Acepto los <a href="terminos.php" target="_blank">Términos y Condiciones</a>
                        </label>
                        <div id="error-terminos" style="color:red; font-size:12px;"></div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
            </div>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['action'])) {
        if (isset($_GET['dato']) && $_GET['dato'] == 'fal') {
            $msg = 'Error Faltan Datos en el Formulario';
            $clase = 'alert-warning';
        }
        elseif(isset($_GET['dato']) && $_GET['dato'] == 'val'){
            $msg = 'Error: Validación de Datos del Formulario';
            $clase = 'alert-warning';
        } 
    ?>
        <div class="alert <?php echo (isset($clase)) ? $clase : ''; ?> mt-2" role="alert">
            <?php echo (isset($msg)) ? $msg : ''; ?>
        </div>
    <?php
    }
    ?>
</div>