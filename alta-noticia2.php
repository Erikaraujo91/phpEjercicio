<?php

	try{
		
		$con=new PDO('mysql:host=localhost;dbname=piscaandina2', 'root', '');
		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$titulo=$_REQUEST['titulo'];	
        $imagen=$_REQUEST['imagen'];
        $texto=$_REQUEST['texto'];
        $fecha=$_REQUEST['fecha'];
        $idUser=$_REQUEST['idUser'];

		
		$stmt=$con->prepare('insert into noticias(titulo,imagen,texto,fecha,idUser) values(:titulo,  :imagen, :texto, :fecha, :idUser)');
		
		$stmt->execute(array(':titulo'=>$titulo, ':imagen'=>$imagen, ':texto'=>$texto, ':fecha'=>$fecha, ':idUser'=>$idUser));
		
		
		}catch(PDOException $e){
			
			echo 'Error: '.$e->getMessage();
			
			}

    header('Location:noticias-administracion.php');    
?>  
