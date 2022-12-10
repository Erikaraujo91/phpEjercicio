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
              <div class="nav-wrapper " >
                <a href="index.php" class="brand-logo" >Pisca Andina</a>
                  <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                                  
                  <?php 
                  session_start();
                  if(!isset($_SESSION["session_username"])) {

                    echo '';

                  }else{       

                    $dbperfil=$_SESSION["rol"];}

                  if ($_SESSION['rol']=="admin") { ?> 
                  <!-- Aqui solo aparece este <li> si el usuario es "usuario_admi", el codigo se interpreta como "si la variable session usuario es igual a usuario_admi muestrale esto" -->

                  <div class="nav-wrapper orange darken-4">
                    <ul class="right hide-on-med-and-down">
                      <li class="active"><a href="index.php">Inicio</a></li>
                      <li><a href="noticias.php">Noticias</a></li>
                      <li><a href="usuarios-administracion.php">Administracion de usuarios</a></li>
                      <li><a href="citas-administracion.php">Administracion de citas</a></li>
                      <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                      <li><a href="perfil.php">Perfil</a></li>  
                      <li><a href="logout.php">Cerrar Sesion</a></li>
                    </ul>
                  </ul>
                    <ul class="sidenav" id="mobile-demo">
                      <li class="active"><a href="index.php">Inicio</a></li>
                      <li><a href="noticias.php">Noticias</a></li>
                      <li><a href="usuarios-administracion.php">Administracion de usuarios</a></li>
                      <li><a href="citas-administracion.php">Administracion de citas</a></li>
                      <li><a href="noticias-administracion.php">Administracion de noticias</a></li>
                      <li><a href="perfil.php">Perfil</a></li>  
                      <li><a href="logout.php">Cerrar Sesion</a></li>
                    </ul>
                  </ul>
                </div>
                  <?php } ?>

                  <?php 
                  if ($_SESSION['rol']=="user") { ?>        
                  <li class="active"><a href="index.php">Inicio</a></li>
                  <li><a href="noticias.php">Noticias</a></li>
                  <li><a href="citaciones.php">Citas</a></li>
                  <li><a href="perfil.php">Perfil</a></li>
                  <li><a href="logout.php">Cerrar Sesion</a></li><?php } ?>
        
            
                  <?php
                 if ($_SESSION['rol']!="user" && $_SESSION['rol']!='admin'){?>
                  <ul class="right hide-on-med-and-down">
                     <li class="active"><a href="index.php">Inicio</a></li>
                     <li><a href="noticias.php">Noticias</a></li>
                     <li><a href="registro.php">Registro</a></li>
                    <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
                 </ul> 
                <?php } ?>
              </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
          </div>
        </header>
            <section>
                <div class="row container">
                    <div class="col s12 center about">
                        <h1>Sobre Nosotros...</h1>
                        <p><h6>Pisca Andina surge de la ilusión y ganas de compartir la tradición gastronómica de los andes venezolanos. Una pequeña empresa con gran amor a sus raices que cuenta con años de experiencia entre los fogones con recetas típicas como arepas, pasteles, hallacas, tequeños o pisca andina(el plato reina de la casa).<br>Trabajamos diariamente para brindarte un traslado de pais por medio del paladar y es por ello que hemos creado los cursos de cocina venezolana ya que cada vez va cogiendo más auge en la preciosa península ibérica, que tan bien nos ha acogido.<br>Os dejamos con algunas de nuestras especialidades y te invitamos a visitar nuestro local en Calle real 11, Paracuellos de Jarama, Madrid.<br>¡Encantados de atenderte!</h6></p>
                    </div>
                </div>
            </section>
            <div class="row container">
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img class="materialboxed" src="assets/images/pasteles.jpg" alt="Cesta con pasteles">
                                <span class="card-title">Desayunos</span>
                            </div>
                            <div class="card-content">
                                <p>Contamos con gran variedad de desayuno típico venezolano. arepas de harina de trigo (tradicion andina) o de harina de maiz blanco, recien hechas con el relleno que desees; Empanadas y nuestra especialidad: Pastelitos Andinos! de patata con queso y de carne picada.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img class="materialboxed" src="assets/images/arroz.jpg" alt="Arroz con leche">
                                <span class="card-title">Postres</span>
                            </div>
                            <div class="card-content">
                                <p>Disfruta de un rico postre 100% hecho en casa y con amor del páramo. La tradicional tres leches bien fresquita y super jugosa. El quesillo de coco o el arroz con leche son algunos de los muchos postres que hacemos a diario para brindar a nuestros clientes la mejor calidad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img class="materialboxed" src="assets/images/cafe_medium.jpg" alt="Taza de café">
                                <span class="card-title">Café 100% arábico</span>
                            </div>
                            <div class="card-content">
                                <p>Trabajamos café ecologico 100% arábico, recolectado con método picking y de tueste natural, dando como resultado un intenso aroma y rico sabor. Nos hemos especializado con importantes baristas para hacer que una taza de café, sea una nueva experiencia cada dia.</p>
                            </div>
                        </div>
                    </div>
            </div> 
      <?php
      include("footer.php");
      ?>
    </body>
  </html>
