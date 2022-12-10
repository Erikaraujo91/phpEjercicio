<!DOCTYPE html>
  <html>
    
    <?php 
        include("header.php");
    ?>
    <body class="orange lighten-3">
    <a href="registro.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">mail</i></a>
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
                <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
            </ul>
        </header>
          <h1>PRUEBA CONECCION BASE DE DATOS</h1>      
          
          
            <?php
            $conexion = new PDO ("mysql:host=localhost;dbname=piscaandina2","root","");
            echo "<br>--------------------------------<br>";





            ?>

      <?php 
        include("footer.php");
      ?>
    </body>
  </html>
