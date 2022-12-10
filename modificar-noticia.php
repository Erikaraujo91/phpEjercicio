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

      $perfil=$_SESSION["rol"];  ;
  ?>


  
  <?php
	$mysql=new mysqli("localhost","root","","piscaandina2");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select * from noticias where idNoticia=$_REQUEST[idNoticia]") or
      die($mysql->error);
	 
    if ($reg=$registro->fetch_array())
    {
  ?>
        <div class="form-group col-xs-offset-3 col-xs-6 col-xs-offset-3">
            
        <form method="get" action="modificar-noticia2.php">
            Id:<input readonly type="text" class="form-control" name="idNoticia" size="25" value="<?php echo $_REQUEST['idNoticia']; ?>">        
            Titulo:<input type="text" class="form-control" name="titulo" size="25" value="<?php echo $reg['titulo']; ?>">
            Imagen:<input type="file" class="form-control" name="imagen" size="25" accept="image/png, image/jpeg" value="<?php echo '<img height="200" width="200" src="data:image/jpeg;base64,'.base64_encode($reg['imagen']);?>"><br>
            Texto:<input type="text" class="form-control" name="texto" size="25" value="<?php echo $reg['texto']; ?>">
            Fecha:<input type="text" class="form-control" name="fecha" size="25" value="<?php echo $reg['fecha']; ?>">
            Usuario:<input type="text" class="form-control" name="idUser" size="25" value="<?php echo $reg['idUser']; ?>">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-sm-offset-3"><input type="submit" class="form-control btn btn-primary " name="enviar" tabindex="7" value="Modificar Noticia"></div>
        </form>
            </div>
  <?php
    }      
    else
	  echo 'No existe la noticia';
	
    $mysql->close(); ?>

      <?php 
        include("footer.php");
      ?>
      <?php
}
?> 
    </body>
  </html>
