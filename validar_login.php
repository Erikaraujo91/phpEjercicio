<?php
session_start();
include 'conexion.php';
include 'cryptoUtils.php';

$username=$_POST['username'];
$password=($_POST['password']);  

//Este metodo recibe por post el usuario y la contraseña sin encriptar
//la contaseña de almacena encriptada en BBDD
//Para poder comprobar el login de usuario se debe encriptar la contraseña obtenida y compararla con la de BBDD

$registros=$mysql->query("SELECT password FROM user_login WHERE usuario='".$username."'") or die($mysql->error);
$passwordAux;

if ($reg=$registros->fetch_array()){
    $passwordAux=$reg['password'];
}

//$salt =  "poasd·!·asADA";
//$cadena = $password;
//echo ($passwordAux.'<br>'.md5Salt($password).'<br>');
//echo ($salt.'<br>'.$salt.$cadena.'<br>'.md5($salt.$cadena));



if($passwordAux == md5Salt($password)){
    //el login es correcto, se hace redirección
    
    $registros=$mysql->query("SELECT rol FROM user_login WHERE usuario='".$username."'") or die($mysql->error);
    $rol;
    if ($reg=$registros->fetch_array()){
        $rol=$reg['rol'];
    }

    echo ('El rol es '.$rol);
    echo ('El username es '.$username);
    $_SESSION['session_username']=$username;
    $_SESSION['rol']=$rol;

    header("Location: http://localhost/trabajoFinalPHP/index.php");

} else {
    // el login es erroneo

    header("Location: http://localhost/trabajoFinalPHP/login.php?message=ERROR");
}


?>