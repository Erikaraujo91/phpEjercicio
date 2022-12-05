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
    <?php
    session_start();
    if(!isset($_SESSION["session_username"])) {
     header("location:login.php");
    } else {

      $dbperfil=$_SESSION["rol"];}
  ?>
    <body class="orange lighten-3">
      <?php
      $err1 = filter_input(INPUT_GET,'err1',FILTER_UNSAFE_RAW);
      $err1 = filter_input(INPUT_GET, 'err2',FILTER_UNSAFE_RAW);
      ?>
    <a href="registro.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">mail</i></a>
    <header>
            <nav class="orange darken-4">
                <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">Pisca Andina</a>
                <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                <?php 
                      if ($_SESSION['rol']=="admin") { ?> 
                        <!-- Aqui solo aparece este <li> si el usuario es "usuario_admi", el codigo se interpreta como "si la variable session usuario es igual a usuario_admi muestrale esto" -->
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="noticias.php">Noticias</a></li>
                        <li><a href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                        <li><a href="citas-administracion.php">Administracion de citas</a></li>
                        <li class= "nav-item active"><a class="nav-link active" href="noticias-administracion.php">Administracion de noticias</a></li>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li>
                </ul>
                  <ul class="sidenav" id="mobile-demo">
                  <li><a href="index.php">Inicio</a></li>
                        <li><a href="noticias.php">Noticias</a></li>
                        <li><a href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                        <li><a href="citas-administracion.php">Administracion de citas</a></li>
                        <li class= "nav-item active"><a class="nav-link active" href="noticias-administracion.php">Administracion de noticias</a></li>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li>
                  </ul>
                        
                        <?php } ?>

                              <?php 
                      if ($_SESSION['rol']=="user") { ?>        
                        <li class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="noticias.php">Noticias</a></li>
                        <li><a href="citas-administracion.php">Citas</a></li>
                        <li><a href="noticias-administracion.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li><?php } ?>

                        <?php 
                      if ((!$_SESSION['rol']=="user")&&((!$_SESSION['rol']=="admin"))) { ?>        
                        <li class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="noticias.php">Noticias</a></li>
                        <li><a href="registro.php">Registro</a></li>
                        <li><a href="login.php">Login</a></li><?php } ?>
                    
                </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </header>
            <section>
                <div class="row container">
                    <div class="col s12 center about">
                        <h2>Panel de administración de noticias</h2><br>
                        <h6>En este apartado el administrador podrá ver, crear, modificar o borrar noticias de la web</h6><br>
                    </div>
                </div>
            </section>
            <?php

    if(!isset($_SESSION["session_username"])) {
     header("location:login.php");
    } else {

      $perfil=$_SESSION["rol"];}
  ?>
        <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
            <h1 class="page-header text-center">Listado de Noticias</h1>
        </div>
  
  <?php
	$mysql=mysqli_connect("localhost","root","","piscaandina2");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select idNoticia, fecha, imagen, texto, titulo, u.nombre as nombre, u.apellido as apellido from noticias n inner join user_login u where n.idUser=u.idUser;") or
      die($mysql->error); 
    echo '<table class="table table-striped table-bordered table-hover">';
    echo '<tr><th>Titulo</th><th>Imagen</th><th>Texto</th><th>Usuario</th><th>Modificar</th><th>Borrar</th></tr>';
    
    while ($reg=$registros->fetch_array())
    {
      echo '<tr class="danger">';
      echo '<td>';
      echo $reg['titulo'];	  
      echo '</td>';  
      echo '<td>';
      echo '<img height="150" width="150" src="data:image/jpeg;base64,'.base64_encode($reg['imagen']).'"/>';
      echo '</td>';
      echo '<td>';
      echo $reg['texto'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['nombre'];	  
      echo '</td>';
      echo '<td>';
      echo '<a class="form-control btn btn-warning" href="modificar-noticia.php?idNoticia='.$reg['idNoticia'].'">Modificar noticia</a>';
      echo '</td>';
      echo '<td>';
      echo '<a href="borrar-noticia.php?idNoticia='.$reg['idNoticia'].'">Eliminar noticia</a>';
      echo '</td>';
      echo '</tr>';	  
    
    }	
    echo '<tr><td colspan="6">';
    echo '<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3"><a class="form-control btn btn-primary" href="alta-noticia.php">Añadir noticia</a></div>';
    
    echo '</td></tr>';
  
    echo '</table>';
        
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