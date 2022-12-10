<?php
//error_reporting(0);
    
 $conn = new PDO ("mysql:host=localhost;dbname=piscaandina2", "root", "");
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$fnac=$_POST['fnac'];
$direccion=$_POST['direccion'];	
$sexo=$_POST['sexo'];
$usuario=$_POST['usuario'];
$password=(md5($_POST['password']));  
//$passwordHash($password);


//consulta para ingresar los datos
$stmt=$conn->prepare('insert into user_login(nombre, apellido, telefono, email, fnac, direccion, sexo, usuario, password) values (:nombre, :apellido, :telefono, :email, :fnac, :direccion, :sexo, :usuario, :password)');

$stmt->execute(array(':nombre'=>$nombre, ':apellido'=>$apellido, ':email'=>$email, ':telefono'=>$telefono, ':fnac'=>$fnac, ':direccion'=>$direccion, ':sexo'=>$sexo,':usuario'=>$usuario, ':password'=>$password));
// }

header('Location:index.php');  

?>


 
