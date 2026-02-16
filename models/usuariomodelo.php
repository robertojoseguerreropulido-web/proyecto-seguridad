<?php
//Importacion de la conexion a BD//
include_once 'conexion.php';

class UsuarioModelo extends Conexion{
    //Metodo para insertar usuarios (Create)//
    public function registrarUsuarioModelo($datos, $tabla){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare(("INSERT INTO usuarios (nombre, email, password) VALUES(:nombre, :email, :clave)"));
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(':clave', $datos['clave'], PDO::PARAM_STR);
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
    public function ingresarUsuarioModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT nombre, password FROM usuarios where nombre = :nombre");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metodo para listar usuarios///
    public function listarUsuariosModelo(){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios ORDER BY id desc");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metod para listar un usuario por ID///
    public function listarUsuarioIdModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///Metodo para Actualizar Usuario///
    public function actualizarUsuarioModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = :nombre, email = :email, password = :clave WHERE id = :id");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(':clave', $datos['clave'], PDO::PARAM_STR);
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

    ///Metodo para Eliminar Usuario///
    public function eliminarUsuarioModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
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

    ///Validar Usuario Ajax//
    public function validarUsuarioModelo($datos){
        try {
            $pdo = $this->conectar();
            $stmt = $pdo->prepare("SELECT nombre FROM `usuarios` WHERE nombre = :nombre");
            $stmt->bindParam(':nombre', $datos, PDO::PARAM_STR);
            $stmt->execute();
            $usuario = $stmt->fetch();
            $stmt = null;
            $pdo = null;
            return $usuario;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    ///validar email Ajax///
    public function validarUsuarioEmailModelo($dato){
        try {
            $pdo = $this->conectar();
            $stmt = $pdo->prepare("SELECT email FROM `usuarios` WHERE email = :email");
            $stmt->bindParam(':email', $dato, PDO::PARAM_STR);
            $stmt->execute();
            $email = $stmt->fetch();
            $stmt = null;
            $pdo = null;
            return $email;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        
    }
}