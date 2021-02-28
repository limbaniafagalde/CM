<?php
require_once "conexionBD.php";

class SecretariasM extends ConexionBD{
    static public function IngresarSecretariaM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR); //es decir que en la bd , el usuario es igual a lo que enviamos en la var post
        $pdo -> execute();
        return $pdo -> fetch(); //retornamos una sola fila
        $pdo -> close();
        $pdo = null; //vaciamos la conexion 
    }

    static public function VerPerfilSecretariaM($tablaBD, $id){
        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $id, PDO::PARAM_INT); //es decir que en la bd , el usuario es igual a lo que enviamos en la var post
        $pdo -> execute();
        return $pdo -> fetch(); //retornamos una sola fila
        $pdo -> close();
        $pdo = null; //vaciamos la conexion 
    }

    static public function ActualizarPerfilSecretariaM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, foto = :foto WHERE id = :id"); //donde la columna sea igual al parametro
        
        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);// variable post
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

        if ($pdo -> execute()) {
            return true;
        }else
        {
            return false;
        }

        $pdo -> close();
        $pdo = null;

    }

}


?>