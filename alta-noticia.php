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
                    <li><a href="registro.php">Registro</a></li>
                    <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
                </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
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
    session_start();
    if(!isset($_SESSION["session_username"])) {
     header("location:login.php");
    } else {

      $perfil=$_SESSION["rol"]; } ;
      ?>
      <div class="form-group col-xs-offset-3 col-xs-6 col-xs-offset-3">
            
        <form method="POST" action="alta-noticia2.php" enctype="multipart/form-data">
                 
            Titulo:<input type="text" class="form-control" name="titulo" size="25">
            Imagen:<input type="file" class="form-control" name="imagen" size="25" accept="image/png, image/jpeg"><br>
            Texto:<input type="text" class="form-control" name="texto" size="25">
            Fecha:<input type="date" class="form-control" name="fecha" size="25">
            Usuario:<input type="text" class="form-control" name="idUser" size="25">
            <div ><input type="submit" name="enviar"  value="Añadir Noticia"></div>
        </form>
      </div>

      <?php 
        include("footer.php");
      ?>
    </body>
  </html>
