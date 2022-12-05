<?php

try{
	
	$con= new PDO('mysql:host=localhost;dbname=piscaandina2','root','');
	
	$idNoticia=$_REQUEST['idNoticia'];
    $titulo=$_REQUEST['titulo'];
    $imagen=$_REQUEST['imagen'];
    $texto=$_REQUEST['texto'];
    $fecha=$_REQUEST['fecha'];
    $idUser=$_REQUEST['idUser'];
	
	$stmt =$con ->prepare('UPDATE noticias SET idNoticia=:idNoticia, titulo=:titulo, imagen=:imagen, texto=:texto, fecha=:fecha, idUser=:idUser where idNoticia=:idNoticia');
	
		$stmt->bindParam(':idNoticia', $idNoticia);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':idUser', $idUser);
		$stmt->execute();
		
		echo $stmt->rowCount();
		
		}catch(PDOException $e){
			
			echo 'Error: '.$e->getMessage();
			
			}


    header('Location:noticias-administracion.php');
  ?>  