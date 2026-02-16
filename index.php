<?php
ob_start();

define('BASE_URL', 'http://localhost/proyectoseguridad/');

///Controladores
require_once 'controllers/controlador.php';
require_once 'controllers/usuariocontroller.php';
require_once 'controllers/ambientecontroller.php';

///Modelos
require_once 'models/enlacespaginasmodelo.php';
require_once 'models/usuariomodelo.php';
require_once 'models/ambientemodelo.php';

$controlador = new Controlador();
$controlador->cargarTemplate();

ob_end_flush();
