<?php

class Controlador
{

    public function cargarTemplate()
    {
        include 'views/template.php';
    }

    //Metodo para gestionar los enlaces
    public function enlacesPaginasControlador()
    {
        $enlace = isset($_GET['action']) ? $_GET['action'] : 'inicio';
        $carpeta   = isset($_GET['dato']) ? $_GET['dato'] : null;

        $modelo = new EnlacesPaginasModelo();
        $rutaVista = $modelo->enlacesPaginas($enlace, $carpeta);
        include($rutaVista);
    }
}
