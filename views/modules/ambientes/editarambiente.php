<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$ambienteControlador = new AmbienteController();
$ambienteControlador->actualizarAmbienteControlador();
$ambiente = $ambienteControlador->listarAmbienteIdControlador();
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
                        <input type="hidden" name="id" id="id" value="<?php echo $ambiente['id'] ?>">
                        <label for="nombreAmbienteEditar" class="form-label">Nombre de Ambiente</label>
                        <input type="text" name="nombreAmbienteEditar" id="nombreAmbienteEditar" value="<?php echo $ambiente['ambientesnombre'] ?>" maxlength="60" class="form-control" placeholder="Ingrese Maximo 60 Caracteres" required>
                        <div id="error-nombre" style="color:red; font: size 10px;"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoAmbienteEditar" id="tipoAmbienteEditar1" value="Ambiente" <?php echo ($ambiente['ambientestipo'] == 'Ambiente') ? 'checked' : ''  ?>>
                        <label class="form-check-label" for="tipoAmbienteEditar1">
                            Ambiente Convencional
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoAmbienteEditar" id="tipoAmbienteEditar2" value="Taller" <?php echo ($ambiente['ambientestipo'] == 'Taller') ? 'checked' : ''  ?>>
                        <label class="form-check-label" for="tipoAmbienteEditar2">
                            Taller Especializado
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoAmbienteEditar" id="tipoAmbienteEditar3" value="Laboratorio" <?php echo ($ambiente['ambientestipo'] == 'Laboratorio') ? 'checked' : ''  ?>>
                        <label class="form-check-label" for="tipoAmbienteEditar3">
                            Laboratorio
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="observacionAmbienteEditar" id="observacionAmbienteEditar"><?php echo $ambiente['ambientesobservacion'] ?></textarea>
                        <label for="observacionAmbienteEditar">Observación Ambiente</label>
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
        if ($_GET['action'] == 'ok-usu') {
            $msg = 'Usuario Registrado correctamente¡';
            $clase = 'alert-success';
        } elseif ($_GET['action'] == 'ins-e') {
            $msg = 'Error al Registrar el Usuario';
            $clase = 'alert-warning';
        }
    ?>
        <div class="alert <?php echo $clase ?> mt-2" role="alert">
            <?php echo (isset($msg)) ? $msg : ''; ?>
        </div>
    <?php
    }
    ?>
</div>