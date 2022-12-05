<?php

class DB {
    public static function conn() {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=piscaandina2", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "HA FALLADO LA CONEXIÓN: " . $e->getMessage();
        }
    }
/**
 * consulta un usuario por nombre
 * @param string $nombre
 * @return array
 */
    public static function verUsuario($usuario) {
        $result=[];
        $conexion = self::conn();
        $sentencia = "Select * from user_login where usuario = ':usuario'";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":usuario" => $usuario));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }
    public static function verTodos() {
    $result=[];
    $conexion = self::conn();
    $sentencia = "Select * from user_login";
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute();
    while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
        array_push($result, $fila);
    }
    $consulta->closeCursor();
    $conexion = null;
    return $result;
    }    
      
/**
 * inserta en la tabla user_data
 * @param string $nombre
 * @param string $apellidos
 * @param string $email
 * @param string $fnac
 * @param string $telefono
 * @param string $direccion
 * @param string $sexo
 * @param string $password
 */
    public static function insertar($nombre, $apellido, $email, $fnac, $telefono, $direccion, $sexo, $password) {
        $conexion = self::conn();
        $sentencia = 'INSERT INTO user_login (nombre, apellido, email, fnac, telefono, direccion, sexo, password) VALUES (:nombre, :apellidos, :email, :fnac, :telefono, :direccion, :sexo, :password)';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":nombre", $nombre);
        $consulta->bindParam(":apellido", $apellido);
        $consulta->bindParam(":email", $email);
        $consulta->bindParam(":fnac", $fnac);
        $consulta->bindParam(":telefono", $telefono);
        $consulta->bindParam(":direccion", $direccion);
        $consulta->bindParam(":sexo", $sexo);
        $consulta->bindParam(":password", $password); 
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        echo "registro insertado";
    }
    
    public static function actualizar($nuevoNombre,$nombre){
        
        $conexion = self::conn();
        $sentencia = "UPDATE user_login SET nombre = :nuevoNombre WHERE  nombre = :nombre";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":nombre", $nombre);
        $consulta->bindParam(":nuevoNombre", $nuevoNombre);
        $consulta->execute();        
        $consulta->closeCursor();
        $conexion = null;
        echo "registro actualizado"; 
    }
    public static function borrar($nombre) {
        
        
        $conexion = self::conn();
        $sentencia = "DELETE FROM user_login WHERE nombre = :nombre ";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":nombre", $nombre);
        $consulta->execute();        
        $consulta->closeCursor();
        $conexion = null;
        echo "registro borrado";
    }
}
