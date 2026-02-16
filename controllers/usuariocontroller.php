<?php

class UsuarioController
{
    ///Metodo para registrar usuarios///
    public function registrarUsuarioControlador()
    {
        if (
            isset($_POST['nombreRegistro']) ||
            isset($_POST['emailRegistro']) ||
            isset($_POST['claveRegistro'])
        ) {
            if (
                !empty($_POST['nombreRegistro']) ||
                !empty($_POST['emailRegistro']) ||
                !empty($_POST['claveRegistro'])
            ) {
                ///validacion expresiones regulares///
                if (
                    preg_match("/^[A-Za-z0-9]+$/", $_POST['nombreRegistro']) &&
                    preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i", $_POST['emailRegistro']) &&
                    preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $_POST['claveRegistro'])
                ) {
                    ///Encriptar Contraseña///
                    $claveEncriptada = crypt($_POST['claveRegistro'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $datos = array(
                        'nombre' => $_POST['nombreRegistro'],
                        'email' => $_POST['emailRegistro'],
                        'clave' => $claveEncriptada
                    );
                    ///Instanciar claxe UsuarioModelo//
                    $respuesta = new UsuarioModelo();
                    if ($respuesta->registrarUsuarioModelo($datos, 'usuarios') == 'success') {
                        header('location:'. BASE_URL .'usuarios/usuarios/ok-ins');
                        exit();
                    } else {
                        header('location:'. BASE_URL .'usuarios/usuarioa/er-ins');
                        exit();
                    }
                } else {
                    header('location:'. BASE_URL .'usuarios/registrar/val');
                    exit;
                }
            } else {
                header('location:'. BASE_URL .'usuarios/registrar/fal');
                exit;
            }
        }
    }

    ///Metodo para Ingresar Usuario///
    public function ingresarUsuarioControlador()
    {
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            $datos = array(
                'nombre' => $_POST['nombre'],
                'clave' => $_POST['clave']
            );
            ///Instanciar el modelo usuario//
            $usuarioModelo = new UsuarioModelo();
            $respuesta = $usuarioModelo->ingresarUsuarioModelo($datos);
            ///Encriptar Contraseña///
            $claveEncriptada = crypt($_POST['clave'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            if (!empty($respuesta)) {
                if ($respuesta['nombre'] == $_POST['nombre'] && $respuesta['password'] == $claveEncriptada) {
                    session_start();
                    $_SESSION['usuarioValido'] = true;
                    $_SESSION['nombreUsuario'] = $_POST['nombre'];
                    header('location:'. BASE_URL .'usuarios/usuarios');
                    exit();
                } else {
                    $resultado = 'err_usu';
                }
            } else {
                $resultado = 'exist';
            }
            if (isset($resultado)) {
                header('location:'. BASE_URL .'usuarios/ingresar/' . $resultado);
                exit();
            }
        }
    }

    ///Metodo para Listar Usuarios///
    public function listarUsuariosControlador()
    {
        $usuarioModelo = new UsuarioModelo();
        $resultado = $usuarioModelo->listarUsuariosModelo();
        return $resultado;
    }

    ///Metodo para listar un solo usario por id///
    public function listarUsuarioIdControlador()
    {
        if (isset($_GET['op'])) {
            $id = $_GET['op'];
            $usuarioModelo = new UsuarioModelo();
            $usuario = $usuarioModelo->listarUsuarioIdModelo($id);
            return $usuario;
        }
    }

    ///Metodo para actualizar al usuario///
    public function actualizarUsuarioControlador()
    {
        if (isset($_POST['editarnombre']) && isset($_POST['editaremail']) && isset($_POST['editarclave'])) {
            ///Encritar la Clave///
            $claveEncriptada = crypt($_POST['editarclave'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $datos = array(
                'nombre' => $_POST['editarnombre'],
                'email' => $_POST['editaremail'],
                'clave' => $claveEncriptada,
                'id' => $_POST['id']
            );
            $usuarioModelo = new UsuarioModelo();
            $respuesta = $usuarioModelo->actualizarUsuarioModelo($datos);
            if ($respuesta == 'success') {
                header('location:'. BASE_URL .'usuarios/usuarios/ok-up');
                exit();
            } else {
                header('location:'. BASE_URL .'usuarios/usuarios/er-up');
                exit();
            }
        }
    }

    ///Metodo para eliminar un usuario///
    public function eliminarUsuarioControlador()
    {
        if (isset($_GET['op'])) {
            $id = $_GET['op'];
            $usuarioModelo = new UsuarioModelo();
            $respuesta = $usuarioModelo->eliminarUsuarioModelo($id);
            header('location:'. BASE_URL .'usuarios/usuarios/' . $respuesta);
            exit();
        }
    }

    ///Validar Usuario Ajax//
    public function validarUsuarioControlador($datos){
        $usuarioModelo = new UsuarioModelo();
        $respuesta = $usuarioModelo->validarUsuarioModelo($datos);
        if($respuesta){
            return 1;
        }
        else{
            return 0;
        }
    }

    ///validar Email Ajax//
    public function validarUsuarioEmailControlador($dato){
        $usuarioModelo = new UsuarioModelo;
        $respuesta = $usuarioModelo->validarUsuarioEmailModelo($dato);
        if($respuesta){
            return 1;
        }
        else{
            return 0;
        }
    }
}
