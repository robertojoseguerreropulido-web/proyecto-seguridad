<?php

class AmbienteController
{
    ///Metodo para registrar ambientes///
    public function registrarAmbienteControlador()
    {
        if (
            isset($_POST['nombreAmbienteRegistro']) ||
            isset($_POST['tipoAmbienteRegistro']) ||
            isset($_POST['observacionAmbienteRegistro']) ||
            isset($_POST['registrar'])
        ) {
            if (
                !empty($_POST['nombreAmbienteRegistro']) &&
                !empty($_POST['tipoAmbienteRegistro']) &&
                !empty($_POST['observacionAmbienteRegistro'])
            ) {
                $datos = array(
                    'nombre' => $_POST['nombreAmbienteRegistro'],
                    'tipo' => $_POST['tipoAmbienteRegistro'],
                    'observacion' => $_POST['observacionAmbienteRegistro']
                );
                ///Instanciar clase AmbienteModelo//
                $ambienteModelo = new AmbienteModelo();
                $respuesta = $ambienteModelo->registrarAmbienteModelo($datos);
                if ($respuesta == 'success') {
                    header('location:' . BASE_URL . 'ambientes/listarambientes/ok-ins');
                    exit();
                } else {
                    header('location:' . BASE_URL . 'ambientes/listarambientes/er-ins');
                    exit();
                }
            } else {
                header('location:' . BASE_URL . 'ambientes/registrarambiente/val-ins');
                exit;
            }
        }
    }

    ///Metodo para Listar Ambientes///
    public function listarAmbientesControlador()
    {
        $ambienteModelo = new AmbienteModelo();
        $resultado = $ambienteModelo->listarAmbientesModelo();
        return $resultado;
    }

    ///Metodo para listar un solo usario por id///
    public function listarAmbienteIdControlador()
    {
        if (isset($_GET['op'])) {
            $id = $_GET['op'];
            $ambienteModelo = new AmbienteModelo();
            $ambiente = $ambienteModelo->listarAmbienteIdModelo($id);
            return $ambiente;
        }
    }

    ///Metodo para actualizar al ambiente///
    public function actualizarAmbienteControlador()
    {
        if (isset($_POST['nombreAmbienteEditar']) && isset($_POST['tipoAmbienteEditar']) && isset($_POST['observacionAmbienteEditar'])) {
            $datos = array(
                'nombre' => $_POST['nombreAmbienteEditar'],
                'tipo' => $_POST['tipoAmbienteEditar'],
                'observacion' => $_POST['observacionAmbienteEditar'],
                'id' => $_POST['id']
            );
            $ambienteModelo = new AmbienteModelo();
            $respuesta = $ambienteModelo->actualizarAmbienteModelo($datos);
            if ($respuesta == 'success') {
                header('location:' . BASE_URL . 'ambientes/listarambientes/ok-up');
                exit();
            } else {
                header('location:' . BASE_URL . 'ambientes/listarambientes/er-up');
                exit();
            }
        }
    }

    ///Metodo para eliminar un ambiente///
    public function eliminarAmbienteControlador()
    {
        if (isset($_GET['op']) && is_numeric($_GET['op'])) {
            $id = $_GET['op'];
            $ambienteModelo = new AmbienteModelo();
            $respuesta = $ambienteModelo->eliminarAmbienteModelo($id);
            header('location:' . BASE_URL . 'ambientes/listarambientes/' . $respuesta);
            exit();
        }
    }
}
