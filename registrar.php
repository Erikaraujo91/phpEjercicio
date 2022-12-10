<?php

include ('conexion.php');
include ('cryptoUtils.php');

//obtener los datos del formularios
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fnac = $_POST['fnac'];
$direccion = $_POST['direccion'];
$sexo = $_POST['sexo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
//comprobar que esta todo correcto


try {
    //comprobamos correo
    $regexMail = '/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/';
    if(!isset($email)){
        echo ('Falta el corrreo');
    }

    if(preg_match($regexMail, $email)!=1){
        echo 'El correo no es valido';
    }

    //insertar

    $sql = "insert into user_login(nombre, apellido, telefono, email, fnac, direccion, sexo, usuario, password)
     values ('".$nombre."','".$apellido."','".$telefono."','".$email."','".$fnac."','"
     .$direccion."','".$sexo."','".$usuario."','".md5Salt($password)."')";

     echo ('<br>'.$sql.'<br>');

    if($mysql->query($sql) == true){
        echo ('Insert ok');
    } else {
        echo ('Insert Erroneo');
    }

    //responder OK o KO

    header('Location:http://localhost/trabajoFinalPHP/registroOK.php');  

} catch(Exception $e){
    echo ($e);
    header("Location: http://localhost/trabajoFinalPHP/registro.php?message=ERROR");

}

?>