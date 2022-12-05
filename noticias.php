<?php
error_reporting(0);
?>
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
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
      <link rel="stylesheet" type="text/css"  href="css/estilos.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="orange lighten-3">
    <a href="login.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">person</i></a>
        <header>
        <nav class="orange darken-4">
                <div class="nav-wrapper" >
                <a href="index.php" class="brand-logo" >Pisca Andina</a>
                <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">                
                              <?php 
                              session_start();
                              if(!isset($_SESSION["session_username"])) {
                               echo '';
                                } else {                  
                                $dbperfil=$_SESSION["rol"];}
                      if ($dbperfil=="admin") { ?> 
                        <!-- Aqui solo aparece este <li> si el usuario es "usuario_admi", el codigo se interpreta como "si la variable session usuario es igual a usuario_admi muestrale esto" -->
                          
                        <li><a href="index.php">Inicio</a></li>
                        <li class="nav-item active"><a class="nav-link active" href="noticias.php">Noticias</a></li>
                        <li><a href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                        <li><a href="citas-administracion.php">Administracion de citas</a></li>
                        <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                        <li><a href="noticias-administracion.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li>

                        </ul>
                        <ul class="sidenav" id="mobile-demo">
                        <li><a href="index.php">Inicio</a></li>
                        <li class="nav-item active"><a class="nav-link active" href="noticias.php">Noticias</a></li>
                        <li><a href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                        <li><a href="citas-administracion.php">Administracion de citas</a></li>
                        <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                        <li><a href="noticias-administracion.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li>
                        </ul>

                        <?php } ?>

                        <?php 
                      if ($_SESSION['rol']=="user") { ?>        
                        <li ><a href="index.php">Inicio</a></li>
                        <li class="active"><a href="noticias.php">Noticias</a></li>
                        <li><a href="citaciones.php">Citas</a></li>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li><?php } ?>                                                    
                </ul>
                <?php
                  if ($_SESSION['rol']!="user" && $_SESSION['rol']!='admin'){?>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Inicio</a></li>
                    <li class="active"><a href="noticias.php">Noticias</a></li>
                    <li><a href="registro.php">Registro</a></li>
                    <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
                </ul>
                <?php } ?>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
                <li class="active"><a href="noticias.php">Noticias</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </header>
            <section>
                <div class="row container">
                    <div class="col s12 center about">
                        <h1>Noticias</h1>
                        <h3>Bienvenido a la sección de noticias de Pisca Andina</h3>
                    </div>
                </div>
            </section>

                </div>
                <?php
	$mysql=mysqli_connect("localhost","root","","piscaandina2");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select fecha, imagen, texto, titulo, u.nombre as nombre, u.apellido as apellido from noticias n inner join user_login u where n.idUser=u.idUser;") or
      die($mysql->error); 
    
    
    while ($reg=$registros->fetch_array())
    {?>
    
    <div class="row container center">
        <div class="col s12">
          <div class="card">
            <div class="card-image">
              <img class="materialboxed" src="" alt=""><!--<?php echo $reg['imagen'];?>-->
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <span class="card-title"><?php echo $reg['titulo'];?></span>
              <h6><?php echo $reg['fecha'];?></h6>
              <p><?php echo $reg['texto'];?></p> 
             <?php echo '<img height="250" width="400" src="data:image/jpeg;base64,'.base64_encode($reg['imagen']).'"/>';?>
               <p>Redactado por: <?php echo $reg['nombre']; ?> <?php echo $reg['apellido']; ?></p> 
              </div>
          </div>   
        </div>

    </div>
    <?php  
    }	  
    $mysql->close();

    ?>
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
    </body>
  </html>