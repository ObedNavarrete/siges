<?php
require_once "conexion.php";

class ModeloUsuarios{
    /*MOSTRAR USUARIOS*/
    static public function mdlMostrarUsuarios($tabla1, $tabla2, $item, $valor){
        //Me sirve para el logueo
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare(
                "SELECT u.id AS id,
                u.nombre AS nombre,
                u.usuario AS usuario,
                u.password AS password,
                r.id AS idRol,
                r.nombre AS rol
                FROM $tabla1 u
                INNER JOIN $tabla2 r
                ON u.idRol = r.id
                WHERE u.$item = :$item AND u.pasivo=0"
            );

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            // //Tambien podria hacerse de esta manera
            // $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = $valor");

            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            //Para mostrar todos los datos de la tabla en la seccion de usuarios
            $stmt = Conexion::conectar()->prepare(
                "SELECT u.id AS id,
                u.nombre AS nombre,
                u.usuario AS usuario, 
                u.password AS password,
                r.nombre AS rol
                FROM $tabla1 u
                INNER JOIN $tabla2 r
                ON u.idRol = r.id
                WHERE u.pasivo=0"
            );

            $stmt -> execute();

            return $stmt -> fetchAll();
        }
    }

        //Para guardar un nuevo usuario
        static public function mdlRegistroUsuarios($tabla, $datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, idRol)
            VALUES (:nombre, :usuario, :password, :idRol)");
    
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(':idRol', $datos["idRol"], PDO::PARAM_INT); 
            //Igual a como sale en el controlador
    
            if ($stmt->execute()) {
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
    
        }


    //Para editar un Usuario
    static public function mdlEditarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET nombre = :nombre, usuario = :usuario, 
                password = :password, idRol = :idRol WHERE id = :id"
        );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(':idRol', $datos["idRol"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        //Igual a como sale en el controlador

        if ($stmt->execute()) {

            return "ok";
        } else {

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    //Eliminar Usuarios
    static public function mdlEliminarUsuarios($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET pasivo = 1
            WHERE id = :id"
        );

        $stmt->bindParam(':id', $datos["id"], PDO::PARAM_INT);

        if($stmt -> execute()) {

            return "ok";

        } else {

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

        }
        $stmt = null;
    }
}