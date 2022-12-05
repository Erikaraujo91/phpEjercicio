<?php

	try{
		
		$con=new PDO('mysql:host=localhost;dbname=piscaandina2', 'root', '');
		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
        $idUser=$_REQUEST['idUser'];
        $fechaCita=$_REQUEST['fechaCita'];	
        $motivoCita=$_REQUEST['motivoCita'];
        

		
		$stmt=$con->prepare('insert into citas(idUser,fechaCita,motivoCita) values(:idUser, :fechaCita, :motivoCita)');
		
		$stmt->execute(array(':idUser'=>$idUser, ':fechaCita'=>$fechaCita, ':motivoCita'=>$motivoCita));
		
		
		}catch(PDOException $e){
			
			echo 'Error: '.$e->getMessage();
			
			}

    header('Location:citaciones.php');    
?>  
