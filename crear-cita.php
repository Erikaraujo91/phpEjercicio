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
                    <li class="active"><a href="registro.php">Registro</a></li>
                    <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
                </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <li class="active"><a href="registro.php">Registro</a></li>
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
    session_start();
    if(!isset($_SESSION["session_username"])) {
     header("location:login.php");
    } else {

      $perfil=$_SESSION["rol"]; } ;
  ?>
      <div class="form-group col-xs-offset-3 col-xs-6 col-xs-offset-3">
            
        <form method="get" action="crear-cita2.php">
                 
            Fecha cita:<input type="date" class="form-control" name="fechaCita" size="25">
            Motivo:<input type="text" class="form-control" name="motivoCita" size="25"><br>
            Usuario:<input type="text" class="form-control" name="idUser" size="25">
            <div ><input type="submit" name="enviar"  value="Crear cita"></div>
        </form>
      </div>
      <?php 
        include("footer.php");
      ?>
    </body>
  </html>
