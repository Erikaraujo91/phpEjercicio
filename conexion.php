<?php


$mysql=new mysqli("localhost","root","","piscaandina2");
if ($mysql->connect_error){
        die("Problemas con la conexión a la base de datos");
}

?>