<?php
// codigo para anular los reportes de error:
error_reporting(0);
include 'DB.php'
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
        <header>
            <nav class="orange darken-4">
                <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">Pisca Andina</a>
                <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="noticias.php">Noticias</a></li>
                    <li><a href="registro.php">Registro</a></li>
                    <li class="active"><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
                </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li class="active"><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
            </ul>
        </header>
                <div class="row container">
                    <div class="col s12 center about">
                        <h1>Accede a tu cuenta</h1>
                    </div>
                </div>
                <?php
                session_start();
              $mysql=new mysqli("localhost","root","","piscaandina2");
              if ($mysql->connect_error)
                die("Problemas con la conexión a la base de datos");
            
            if(isset($_POST["login"])){
              if(!empty($_POST['username']) && !empty(md5($_POST['password']))) {
                $username=$_POST['username'];
                $password=$_POST['password'];
            
            $registros=$mysql->query("SELECT * FROM user_login WHERE usuario='".$username."' AND password='".$password."'") or die($mysql->error);

                if ($reg=$registros->fetch_array()){
            $dbusername=$reg['usuario'];
            $dbpassword=$reg['password'];
            $dbperfil=$reg['rol'];
            
            if($username == $dbusername && $password == $dbpassword)
            
            {
            
            $_SESSION['session_username']=$username;
            $_SESSION['rol']=$dbperfil;
            
            /* Redirect browser */
            header("Location: index.php");
            }
            } 
            else {
            
            $message="<div><h6><center>¡Nombre de usuario o contraseña invalida!<br><br><center></h6></div>";
            }
            
            } else {
            $message="<div><h6><center>Ingresa tus datos de usuario<br><br><center></h6></div>"; "Ingresa tus datos de usuario";
            }
            }
            ?>
            

          <div class="row container">
            <div class="col s12 center about">
              <div class="row center">
              <?php echo $message;?>
                <div class="form-group col-xs-offset-4 col-xs-4" >
                  <form name="loginform" id="loginform" action="" method="POST">
                    <h5 class="login">Nombre De Usuario</h5>
                    <input type="text" name="username" id="username"  class="form-control" value="" size="20" />        
                    <h5 class="login">Contraseña</h5>
                    <input type="password" name="password" id="password"  class="form-control" value="" size="20"/>
                      <div class="col-xs-12 col-md-5 col-md-offset-1">
                      <input type="submit" name="login"  class="form-control btn btn-success" value="Acceder"/>
                      <a class="waves-effect waves-light btn" href="registro.php">Registro</a>
                      </div>
                        <!-- <div class="col-xs-12 col-md-5"><a class="form-control btn btn-success" href="registro.php" >Registro</a>
                      </div> -->
                  </form>
                </div>
              </div>
            </div>     	
          </div>
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