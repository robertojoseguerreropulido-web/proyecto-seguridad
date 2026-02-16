<?php
require_once '../../controllers/usuariocontroller.php';
require_once '../../models/usuariomodelo.php';

class Ajax{
    public $usuarioValidar;
    public $emailValidar;

    public function validarUsuarioAjax(){
        $datos = $this->usuarioValidar;
        $usuarioControlador = new UsuarioController();
        $respuesta = $usuarioControlador->validarUsuarioControlador($datos);
        echo $respuesta;
    }

    public function validarEmailAjax(){
        $dato = $this->emailValidar;
        $usuarioControlador = new UsuarioController;
        $respuesta = $usuarioControlador->validarUsuarioEmailControlador($dato);
        echo $respuesta;
    }
}

///Creacion de objetos tipo AJAX///
$ajax = new Ajax();
if(isset($_POST['varusuario'])){
    $ajax->usuarioValidar = $_POST['varusuario'];
    $ajax->validarUsuarioAjax();
}
elseif(isset($_POST['email'])){
    $ajax->emailValidar = $_POST['email'];
    $ajax->validarEmailAjax();
}
