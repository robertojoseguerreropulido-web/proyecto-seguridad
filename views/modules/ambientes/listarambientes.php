<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$ambienteControlador = new AmbienteController();
///Validar eliminar usuario///
if (isset($_GET['op']) && is_numeric($_GET['op'])) {
    $ambienteControlador->eliminarAmbienteControlador();
}
$datos = $ambienteControlador->listarAmbientesControlador();
///SweetAlert///
if (isset($_GET['op']) && $_GET['op'] == 'success') {
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: "<?php echo ($_GET['op'] == 'success') ? 'success' : 'error'; ?>",
                title: "<?php echo ($_GET['op'] == 'success') ? 'Ambiente Eliminado' : 'Error'; ?>",
                text: "<?php echo ($_GET['op'] == 'success') ? '¡Ambiente Eliminado Correctamente!' : 'Error al Elimnar un Ambiente'; ?>",
                confirmButtonText: 'Aceptar'
            })
        })
    </script>
<?php
}
?>
<div class="container">
    <div class="row">
        <?php
        ////REspuestas para registrar y actualizar usuario///
        if (isset($_GET['op'])) {
            switch ($_GET['op']) {
                case 'ok-ins':
                    $msg = '¡Ambiente Registrado Correctamente!';
                    $estado = 'success';
                    break;
                case 'er-ins':
                    $msg = '¡ERROR: Ambiente No Registrador!';
                    $estado = 'danger';
                    break;
                case 'ok-up':
                    $msg = "!Ambiente Actualizado Correctamente!";
                    $estado = 'success';
                    break;
                case 'er-up':
                    $msg = '¡ERROR: Surgio algun problema!';
                    $estado = "danger";
                    break;
            }
        }
        if (isset($msg)) {
        ?>
            <div class="alert alert-<?php echo $estado ?> mt-3" role="alert">
                <p><?php echo $msg; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col">
            <h1>LISTADO DE USUARIOS</h1>
        </div>
        <div class="col">Ambiente: <?php echo $_SESSION['nombreUsuario'] ?></div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre Ambiente</th>
                <th scope="col">Tipo Ambiente</th>
                <th scope="col">Observación Ambiente</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos as $ambientes) {
            ?>
                <tr>
                    <td scope="row"><?php echo $ambientes['ambientesnombre'] ?></td>
                    <td><?php echo $ambientes['ambientestipo'] ?></td>
                    <td><?php echo $ambientes['ambientesobservacion'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>ambientes/editarambiente/<?php echo $ambientes['id']; ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                        |
                        <a href="#" onclick="eliminarAmbiente(<?php echo $ambientes['id'] ?>)"><i class="bi bi-trash3-fill"></i> Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>