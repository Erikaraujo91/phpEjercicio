<!DOCTYPE html>
  <html>
    
    <?php 
        include("header.php");
    ?>
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
      <?php 
        include("footer.php");
      ?>
    </body>
  </html>
