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
                        <li class="nav-item active" ><a class="nav-link active" href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                        <li><a href="citas-administracion.php">Administracion de citas</a></li>
                        <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                        <li><a href="noticias-administracion.php">Perfil</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li>
                    </ul>
                      <ul class="sidenav" id="mobile-demo">
                      <li><a href="index.php">Inicio</a></li>
                        <li><a href="noticias.php">Noticias</a></li>
                        <li class="nav-item active" ><a class="nav-link active" href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                        <li><a href="citas-administracion.php">Administracion de citas</a></li>
                        <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                        <li><a href="noticias-administracion.php">Perfil</a></li>
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
                        <h2>Panel de administración de usuarios</h2><br>
                        <h6>En este apartado el administrador podrá ver, crear, modificar o borrar usuarios de la web</h6><br>
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
            <h1 class="page-header text-center">Listado de usuarios</h1>
        </div>
  <div>
  <?php
	$mysql=mysqli_connect("localhost","root","","piscaandina2");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select * from user_login") or
      die($mysql->error); 
    echo '<table class="table table-striped table-bordered table-hover">';
    echo '<tr><th>Id Usuario</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Fecha de Nacimiento</th><th>Telefono</th><th>Direccion</th><th>Sexo</th><th>Usuario</th><th>Contraseña</th><th>Perfil</th><th>Modificar</th><th>Borrar</th></tr>';
    
    while ($reg=$registros->fetch_array())
    {
      echo '<tr class="danger">';
      echo '<td>';
      echo $reg['idUser'];	  
      echo '</td>'; 
      echo '<td>';
      echo $reg['nombre'];	  
      echo '</td>';  
      echo '<td>';
      echo $reg['apellido'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['email'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['fnac'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['telefono'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['direccion'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['sexo'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['usuario'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['password'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['rol'];	  
      echo '</td>';
      echo '<td>';
      echo '<a class="form-control btn btn-warning" href="modificar-usuario1.php?idUser='.$reg['idUser'].'">Modificar</a>';
      echo '</td>';
      echo '<td>';
      echo '<a href="borrar-usuario.php?idUser='.$reg['idUser'].'">Eliminar</a>';
      echo '</td>';
      echo '</tr>';	  
    
    }	
    echo '<tr><td colspan="6">';
    echo '<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3"><a class="form-control btn btn-primary" href="alta-usuario.php">Añadir usuario</a></div>';
    
    echo '</td></tr>';
  
    echo '</table>';
        
    $mysql->close();

  ?>
  </div>
  <br><br><br>
    <?php 
      include("footer.php");
    ?>
    </body>
  </html>
