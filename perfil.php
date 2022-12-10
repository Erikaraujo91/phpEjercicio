<!DOCTYPE html>
  <html>
    
    <?php 
        include("header.php");
    ?>
    <body class="orange lighten-3">
      <header>
        <nav class="orange darken-4">
          <div class="nav-wrapper" >
            <a href="index.php" class="brand-logo">Pisca Andina</a>
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
                  <li><a href="noticias.php">Noticias</a></li>
                  <li><a href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                  <li><a href="citas-administracion.php">Administracion de citas</a></li>
                  <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                  <li class="nav-item"><a class="nav-link active" href="perfil.php">Perfil</a></li>
                  <li><a href="logout.php">Cerrar Sesion</a></li>
                  
              </ul>
                <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
                  <li><a href="noticias.php">Noticias</a></li>
                  <li><a href="usuarios-administracion.php" >Administracion de usuarios</a></li>
                  <li><a href="citas-administracion.php">Administracion de citas</a></li>
                  <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                  <li class="nav-item active"><a class="nav-link active" href="perfil.php">Perfil</a></li>
                  <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
                  <?php } ?>

                  <?php 
                  if ($_SESSION['rol']=="user") { ?>        
                  <li><a href="index.php">Inicio</a></li>
                  <li><a href="noticias.php">Noticias</a></li>
                  <li><a href="citaciones.php">Citas</a></li>
                  <li  class="active"><a href="perfil.php">Perfil</a></li>
                  <li><a href="logout.php">Cerrar Sesion</a></li><?php } ?>                             
                    
              </ul>
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
          <div class="row container center">
            <div class="col s12 center about">
            <h3>Bienvenid@ <?php echo $_SESSION['session_username']?></h3>
            </div>
            </section>             
                <?php
                  $username= $_SESSION['session_username'];
                  $mysql=mysqli_connect("localhost","root","","piscaandina2");
                  if ($mysql->connect_error)
                  die("Problemas con la conexión a la base de datos");
                  $registros=$mysql->query("select * from user_login where usuario='$username'") or
                  die($mysql->error);   
                  while ($reg=$registros->fetch_array())
                  {
                ?>   
                    <div class="row container">
                      <div class="row container">
                        <div class="col s12 m9">
                          <div class="card">
                            <div class="card-content">
                          <span class="card-title"><b>Nombre: </b><?php echo $reg['nombre'];?></span>
                          <h6><b>Apellido: </b> <?php echo $reg['apellido'];?></h6>
                          <h6><b>Email: </b><?php echo $reg['email'];?></h6>
                          <h6><b>Fecha de nacimiento: </b><?php echo $reg['fnac'];?></h6>
                          <h6><b>Telefono: </b><?php echo $reg['telefono'];?></h6>
                          <h6><b>Direccion: </b><?php echo $reg['direccion'];?></h6>
                          <h6><b>Sexo: </b><?php echo $reg['sexo'];?></h6>
                          <h6><b>Nombre de Usuario: </b><?php echo $reg['usuario'];?></h6>
                          <h6><b>Contraseña: </b><?php echo $reg['password'];?></h6>
                          <h6><b>Rol de Usuario: </b><?php echo $reg['rol'];?></h6>
                          <?php echo '<a class="form-control btn btn-warning center" href="modificar-perfil.php?idUser='.$reg['idUser'].'">Modificar</a>'; ?>
                      </div>
                    </div>   
                </div>
              </div>
            </div>
          </div>
        <?php  
          }	  
        $mysql->close();
        ?>
        <?php 
        include("footer.php");
        ?>
    </body>
  </html>
