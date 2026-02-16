<?php
session_start();
if(!$_SESSION['usuarioValido']){
    header('location:index.php?action=inicio');
}
?>
<h1>salir</h1>
<p>El usuario: <?php echo $_SESSION['nombreUsuario'] ?></p>
<p>Ha Finalizado la Sesion.</p>
<?php
session_destroy();
?>