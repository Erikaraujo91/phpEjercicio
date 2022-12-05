<?php
error_reporting(0);
include 'operacionesDB.php'
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
      <link type="text/css" rel="stylesheet" href="/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
      <link rel="stylesheet" type="text/css"  href="css/estilos.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="orange lighten-3">
      <?php
      $err1 = filter_input(INPUT_GET,'err1',FILTER_UNSAFE_RAW);
      $err1 = filter_input(INPUT_GET, 'err2',FILTER_UNSAFE_RAW);
      ?>
    <a href="login.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">person</i></a>
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
                        <h2>Bienvenido a los Andes</h2><br>
                        <h6>¿Te gustaría aprender a realizar nuestros platos? ¿quisieras aprender otras tecnicas de cocinado y experimentar con nuevas recetas? <br> No lo pienses más, ésta es tu oportunidad para aprender, conocer gente y crecer en el ámbito gastronómico, contamos con un equipo profesional de alta calidad que estaran encantados en brindar sus conocimiento y a la vez pasarlo a lo grande en nuestras clases de cocina (disponibles tambien para los peques de la casa). <br> ¡Regístrate y pide cita antes de que se agoten las plazas!</h6><br>
                    </div>
                </div>
            </section>
            <div class="col 6" center>   
            <div class="row">
              <div class="col s8 offset-s2">
                <h4>Rellena el Formulario</h4>
              </div>
            </div>           
            <div class="row">
              <div class="col 6">
<!-- Añadir la accion al ejecutar el formulario -->
                <form class="col s12" action="operacionesDB.php" method="POST">                                            
                  <div class="row">
                    <div class=" col s8 offset-s2"> 
                      <label for="nombre">Nombre</label>                                  
                      <input id="nombre" type="text" class="validate" name="nombre" required>                                                                   
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="apellido">Apellido</label>
                      <input id="apellido" type="text" class="validate" name="apellido" required>                                  
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="validate" name="email" required>                                  
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="telefono">Teléfono</label>
                      <input id="telefono" type="tel" class="validate" name="telefono" required>                                  
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="fnac">Fecha de nacimiento</label>
                      <input type="date" id="fnac" name="fnac" required>                                  
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="direccion">Dirección</label>
                      <input id="direccion" class="materialize-texarea" name="direccion" required>                                  
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="sexo">Sexo</label>
                      <input id="sexo" class="materialize-texarea" name="sexo" required>                                  
                    </div>
                    <div class=" col s8 offset-s2">
                      <label for="usuario">Usuario</label>
                      <input id="usuario" class="materialize-texarea" name="usuario" required>                                  
                    </div>
                    <div class=" col s6 offset-s2">
                      <label for="password">Contraseña</label>
                      <input id="password" type="password" class="validate" name="password" required>
                    </div>
                  </div>
                  <div class="input-field col s8 offset-s2">
                    <button class="btn waves-effect waves-light" color="green" type="submit" name="action">Registrar<i class="material-icons right">send</i></button>
                  </div>
              </div>
            </div>
          </form>
        </div>
        <?php echo $mensaje; ?>
        <hr style="color: black; background-color: black; width:75%;" />
        <div class="row">
          <div class="col s8 offset-s2 center">
            <h4>¿Ya estás registrado?<br>Accede a tu cuenta para no perderte nada</h4><br><br>                           
              <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='login.php'">Login</button><br><br>                         
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