<?php
error_reporting(0);
?>
<!DOCTYPE html>
  <html>
    
    <?php 
      include("header.php");
    ?>

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
          
    <?php 
      include("footer.php");
    ?>

    </body>
  </html>
