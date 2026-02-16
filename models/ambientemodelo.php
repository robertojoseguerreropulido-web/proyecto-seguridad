<?php
//Importacion de la conexion a BD//
include_once 'conexion.php';

class AmbienteModelo extends Conexion{
    //Metodo para insertar ambientes (Create)//
    public function registrarAmbienteModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("INSERT INTO ambientes (ambientesnombre, ambientestipo,ambientesobservacion) VALUES(:nombre,:tipo,:observacion)");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $stmt->bindParam(':observacion', $datos['observacion'], PDO::PARAM_STR);
        $resultado = $stmt->execute();
        ///Cerrar Conexiones//
        $stmt = null;
        $pdo = null;
        if($resultado){
            return "success";
        }
        else{
            return "error";
        }
    }

    ///Metodo para ingresar a sesion//
    public function ingresarAmbienteModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT nombre, password FROM ambientes where nombre = :nombre");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metodo para listar ambientes///
    public function listarAmbientesModelo(){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT * FROM ambientes ORDER BY id desc");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metod para listar un ambiente por ID///
    public function listarAmbienteIdModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT * FROM ambientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metodo para Actualizar Ambiente///
    public function actualizarAmbienteModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("UPDATE ambientes SET ambientesnombre = :nombre, ambientestipo = :tipo, ambientesobservacion = :observacion WHERE id = :id");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $stmt->bindParam(':observacion', $datos['observacion'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = 'success';
        }
        else{
            $resultado = 'error';
        }
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metodo para Eliminar Ambiente///
    public function eliminarAmbienteModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("DELETE FROM ambientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            ///verificar si se elimio el registro///
            if($stmt->rowCount() > 0){
                $respuesta = 'success';
            }
            else{
                $respuesta = 'error';
            }
        }
        $stmt = null;
        $pdo = null;
        return $respuesta;
    }
}