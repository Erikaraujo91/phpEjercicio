<?php

try{
	
	$con= new PDO('mysql:host=localhost;dbname=piscaandina2','root','');
	
	$idUser=$_REQUEST['idUser'];
    $nombre=$_REQUEST['nombre'];
    $apellido=$_REQUEST['apellido'];
    $email=$_REQUEST['email'];
    $fnac=$_REQUEST['fnac'];
    $telefono=$_REQUEST['telefono'];
    $direccion=$_REQUEST['direccion'];
    $sexo=$_REQUEST['sexo'];
    $usuario=$_REQUEST['usuario'];
    $pass=$_REQUEST['pass'];
    $rol=$_REQUEST['rol'];
	
	$stmt =$con ->prepare('UPDATE user_login SET idUser=:idUser, nombre=:nombre, apellido=:apellido, email=:email, fnac=:fnac, telefono=:telefono, direccion=:direccion, sexo=:sexo, usuario=:usuario, pass=:pass, rol=:rol where idUser=:idUser');
	
		$stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fnac', $fnac);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':rol', $rol);
		$stmt->execute();
		
		echo $stmt->rowCount();
		
		}catch(PDOException $e){
			
			echo 'Error: '.$e->getMessage();
			
			}


    header('Location:usuarios-administracion.php');
  ?>  