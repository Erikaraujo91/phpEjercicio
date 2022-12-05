<?php

	try{
		
		$con=new PDO('mysql:host=localhost;dbname=piscaandina2','root','');
		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$idNoticia=$_REQUEST['idNoticia'];
		
		
		$stmt=$con->prepare('DELETE FROM noticias WHERE idNoticia=:idNoticia');
		
		$stmt->execute(array(':idNoticia'=>$idNoticia));
		
		echo $stmt->rowCount();
		
		}catch(PDOException $e){
			
			
			echo 'Error: ' . $e->getMessage();	
			
			
			
			}

	header('Location:noticias-administracion.php');  

  ?>  
