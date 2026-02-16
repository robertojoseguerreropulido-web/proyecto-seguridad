<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$ambienteControlador = new AmbienteController();
$ambienteControlador->registrarAmbienteControlador();
?>
<div class="container">
    <div class="row">
        <div class="col">Usuario: <?php echo $_SESSION['nombreUsuario'] ?></div>
    </div>
    <form method="post" onsubmit="return validarRegistroAmbiente()">
        <fieldset>
            <legend>Registrar Ambientes</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nombreAmbienteRegistro" class="form-label">Nombre de Ambiente</label>
                        <input type="text" id="nombreAmbienteRegistro" name="nombreAmbienteRegistro" maxlength="60" class="form-control" placeholder="Ingrese Maximo 60 Caracteres" required>
                        <div id="error-nombre" style="color:red; font: size 10px;"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoAmbienteRegistro" id="tipoAmbienteRegistro1" value="Ambiente">
                        <label class="form-check-label" for="tipoAmbienteRegistro1">
                            Ambiente Convencional
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoAmbienteRegistro" id="tipoAmbienteRegistro2" value="Taller" checked>
                        <label class="form-check-label" for="tipoAmbienteRegistro2">
                            Taller Especializado
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoAmbienteRegistro" id="tipoAmbienteRegistro3" value="Laboratorio" checked>
                        <label class="form-check-label" for="tipoAmbienteRegistro3">
                            Laboratorio
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="observacionAmbienteRegistro" id="observacionAmbienteRegistro"></textarea>
                        <label for="observacionAmbienteRegistro">Observación Ambiente</label>
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
        if (isset($_GET['op']) && $_GET['op'] == 'fal') {
            $msg = 'Error Faltan Datos en el Formulario';
            $clase = 'alert-warning';
        } elseif (isset($_GET['op']) && $_GET['op'] == 'val-ins') {
            $msg = 'Error: Faltan datos en el Formulario';
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