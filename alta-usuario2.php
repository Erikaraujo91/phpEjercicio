<?php

	try{
		
		$con=new PDO('mysql:host=localhost;dbname=piscaandina2', 'root', '');
		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$nombre=$_REQUEST['nombre'];	
        $apellido=$_REQUEST['apellido'];
        $email=$_REQUEST['email'];
        $fnac=$_REQUEST['fnac'];
        $telefono=$_REQUEST['telefono'];
        $direccion=$_REQUEST['direccion'];
        $sexo=$_REQUEST['sexo'];
        $usuario=$_REQUEST['usuario'];
        $password=$_REQUEST['password'];
        $rol=$_REQUEST['rol'];

		
		$stmt=$con->prepare('insert into user_login(nombre,apellido,email,fnac,telefono,direccion,sexo,usuario,password,rol) values(:nombre,  :apellido, :email, :fnac, :telefono, :direccion, :sexo, :usuario, :password, :rol)');
		
		$stmt->execute(array(':nombre'=>$nombre, ':apellido'=>$apellido, ':email'=>$email, ':fnac'=>$fnac, ':telefono'=>$telefono, ':direccion'=>$direccion, ':sexo'=>$sexo, ':usuario'=>$usuario, ':password'=>$password, ':rol'=>$rol));
		
		
		}catch(PDOException $e){
			
			echo 'Error: '.$e->getMessage();
			
			}

    header('Location:usuarios-administracion.php');    
?>  
