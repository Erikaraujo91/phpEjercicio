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
                <li class="active"><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
              </ul>
            </div>
          </nav>
          <ul class="sidenav" id="mobile-demo">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="noticias.php">Noticias</a></li>
            <li class="active"><a href="registro.php">Registro</a></li>
            <li><a href="login.php">Login</a></li><i class="Small material-icons">person</i>
          </ul>
    </header>
      <div class="row container">
        <div class="col s12 center">
          <h1>Regístrate</h1>
                <!-- Empieza formulario registro -->
          <div class="row">
            <?php 
            if(isset($_REQUEST["message"])){
            $msg="Error al guardar el usuario";
            }
            ?>
            <p style="color:red;">
            <?php if(isset($msg))
            {
            echo $msg;
            }
            ?>
              <!-- Añadir la accion al ejecutar el formulario -->
              <form class="col s12 center" action="src/registrar.php" method="POST">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="nombre" placeholder="Nombre" type="text" class="validate" name="nombre" required >
                    <label for="nombre" class="class="black-text text-darken-2></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="apellido" placeholder="Apellido" type="text" class="validate" name="apellido" required>
                    <label for="apellido"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" placeholder="Email" type="email" class="validate" name="email" required>
                    <label for="email"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="telefono" placeholder="Teléfono" type="tel" class="validate" name="telefono" required>
                    <label for="telefono"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="fnac" placeholder="Fecha de Nacimiento" type="date" name="fnac" class="validate"  required>
                    <label for="date"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="direccion" placeholder="Dirección" type="text" class="validate" name="direccion" required>
                    <label for="direccion"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="sexo" placeholder="Sexo" type="text" class="validate" name="sexo" required>
                    <label for="sexo"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="usuario" placeholder="Usuario" type="text" class="validate" name="usuario" required>
                    <label for="usuario"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" placeholder="Contraseña" type="password" class="validate" name="password" required>
                    <label for="password"></label>
                  </div>
                </div>
                <div class="input-field col s8 offset-s2">
                  <button class="btn waves-effect waves-light" color="green" type="submit" name="action">Registrar<i class="material-icons right">send</i></button>
                </div>
              </form>
            </div>
        </div>
      </div>
<!-- FIN formulario registro -->
      <?php 
        include("footer.php");
      ?>
    </body>
  </html>



   

       
