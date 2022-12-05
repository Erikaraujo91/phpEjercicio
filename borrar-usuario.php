<?php

	try{
		
		$con=new PDO('mysql:host=localhost;dbname=piscaandina2','root','');
		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$idUser=$_REQUEST['idUser'];
		
		
		$stmt=$con->prepare('DELETE FROM user_login WHERE idUser=:idUser');
		
		$stmt->execute(array(':idUser'=>$idUser));
		
		echo $stmt->rowCount();
		
		}catch(PDOException $e){
			
			
			echo 'Error: ' . $e->getMessage();	
			
			
			
			}

	header('Location:usuarios-administracion.php');  

  ?>  
