<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <meta name="description" content="Pagina de practicas masterD"/>
      <meta name="robots" content="NOFOLLOW"/>
      <meta name="Author" content="Erik"/>
      <meta name="keywords" content="Pisca, Andes, Gastronomia, Tequeños, Pastelitos, Pasteles, Empanadas"/>
      <meta name="revisit-after" content="2 days"/>
      <meta name="category" content="practicas"/>
      <title>Pisca Andina</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- importamos materialize -->
      <link type="text/css" rel="stylesheet" href="/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
      <link rel="stylesheet" type="text/css"  href="css/estilos.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="orange lighten-3">
      <?php
      $err1 = filter_input(INPUT_GET,'err1',FILTER_UNSAFE_RAW);
      $err1 = filter_input(INPUT_GET, 'err2',FILTER_UNSAFE_RAW);
      ?>
        <header>
            <nav class="orange darken-4">
                <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">Pisca Andina</a>
                <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="noticias.php">Noticias</a></li>
                    <li><a href="logout.php">Cerrar Sesion</a></li>      
                </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </header>
            <section>
                <div class="row container">
                    <div class="col s12 center about">
                        <h2>Modificación de perfil</h2><br>
                        <h6>En este apartado podrás modificar tu perfil</h6><br>
                    </div>
                </div>
            </section>
            <?php
    session_start();
    if(!isset($_SESSION["session_username"])) {
     header("location:login.php");
    } else {

      $perfil=$_SESSION["rol"];  ;
  ?>

  <?php
	$mysql=new mysqli("localhost","root","","piscaandina2");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select * from user_login where idUser=$_REQUEST[idUser]") or
      die($mysql->error);
	 
    if ($reg=$registro->fetch_array())
    {
      ?>
        <div class="container">
          <div class="form-group col-xs-offset-3 col-xs-6 col-xs-offset-3">
            <form method="get" action="modificar-perfil2.php">
                Id:<input readonly type="text" class="form-control" name="idUser" size="25" value="<?php echo $_REQUEST['idUser']; ?>">        
                Nombre:<input type="text" class="form-control" name="nombre" size="25" value="<?php echo $reg['nombre']; ?>">
                Apellido:<input type="text" class="form-control" name="apellido" size="25" value="<?php echo $reg['apellido']; ?>">
                Email:<input type="text" class="form-control" name="email" size="25" value="<?php echo $reg['email']; ?>">
                Fecha de nacimiento:<input type="text" class="form-control" name="fnac" size="25" value="<?php echo $reg['fnac']; ?>">
                Telefono:<input type="text" class="form-control" name="telefono" size="25" value="<?php echo $reg['telefono']; ?>">
                Direccion:<input type="text" class="form-control" name="direccion" size="25" value="<?php echo $reg['direccion']; ?>">
                Sexo:<input type="text" class="form-control" name="sexo" size="25" value="<?php echo $reg['sexo']; ?>">
                Usuario:<input readonly type="text" class="form-control" name="usuario" size="25" value="<?php echo $reg['usuario']; ?>">
                Contraseña:<input type="text" class="form-control" name="pass" size="25" value="<?php echo $reg['password']; ?>">
                Rol:<input type="text" class="form-control" name="rol" size="25" value="<?php echo $reg['rol']; ?>">
                <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-sm-offset-3"><input type="submit" class="form-control btn btn-primary " name="enviar" tabindex="7" value="Modificar Perfil"></div>
            </form>
          </div>
        </div>
      <?php
    }      else
	  echo 'No existe el usuario';
    
    $mysql->close(); ?>

                <footer class="page-footer grey darken-4">
                  <div class="container">
                    <div class="row">
                      <div class="col l8 m6 s12">
                        <h5 class="white-text">Contáctanos</h5>
                        <p class="grey-text text-lighten-4">
                        &#128205; C. Real, 11, 28860 Paracuellos de Jarama, Madrid<br>
                        &#128222; Telefono: 644973950 <br>
                        &#128236; E-mail: piscaandina22@gmail.com</a></p>
                      </div>
                      <div class="col l2 m4 offset-l2 s12">
                        <h5 class="white-text">Enlaces</h5>
                        <ul>
                          <li><a class="grey-text text-lighten-3" href="index.php">Inicio</a></li>
                          <li><a class="grey-text text-lighten-3" href="noticias.php">Noticias</a></li>
                          <li><a class="grey-text text-lighten-3" href="registro.php">Registro</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="footer-copyright">
                    <div class="container center">
                    © 2022 Copyright MasterD
                                <a href="https://www.facebook.com/profile.php?id=100083407342925" target="_blank"><img src="assets/images/fb.jpg" alt="logo-facebook" id="facebook"></a>            
                    <a href="https://www.instagram.com/pisca.andina/" target="_blank"><img src="assets/images/ig.jpg" alt="logo-instagram" id="instagram"></a>
                    </div>
                  </div>
              </footer>
      <!-- Llamada al archivo javaScript -->
      <script src="http://localhost/trabajoFinalPHP/js/script.js" ></script>
      <!-- Llamada al archivo/cdn Materialize -->
      <!-- <script src="/script/materialize.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <?php
        }
      ?> 
  </body>
</html>