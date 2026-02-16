<?php
class EnlacesPaginasModelo{
    //Metodo para gestionas los enlaces
    public function enlacesPaginas($enlace, $carpeta = null){
        //Ruta base de lasviews//
        $basePath = 'views/modules/';
        $ruta = "{$basePath}{$enlace}";

        //verificar si existe carpeta///
        if(isset($carpeta)){
            $ruta .= "/{$carpeta}";
        }

        $ruta .= '.php';

        ///Verificar si existe la ruta///
        if(!file_exists($ruta)){
            $ruta = $basePath . "errorpagina.php";
        }
        return $ruta;
    }

}