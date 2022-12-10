<!DOCTYPE html>
  <html>
    
    <?php 
        include("header.php");
    ?>

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

<!-- Empieza formulario login -->
    <div class="row container">
            <div class="col s12 center about">
              <div class="row center">
              
              <?php 
              if(isset($_REQUEST["message"])){
                $msg="Usuario o contraseña incorrecto";
              }
              ?>
              <p style="color:red;">
              <?php if(isset($msg))
              {
              echo $msg;
              }
              ?>

              </p>
                <div class="form-group col-xs-offset-4 col-xs-4" >
                  <form action="src/validar_login.php" method="POST">
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
<!-- FIN formulario login -->
      <?php 
        include("footer.php");
      ?>
    </body>
  </html>
