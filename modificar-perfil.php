<!DOCTYPE html>
  <html>
    
    <?php 
        include("header.php");
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

      <?php 
        include("footer.php");
      ?>
      <?php
        }
      ?> 
  </body>
</html>
