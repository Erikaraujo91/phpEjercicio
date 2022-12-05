<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejemplo simple de login con PHP en la aplicación</title>
</head>
<body>
    <!-- Se va a procesar en login.php y se enviará por POST, no por GET-->
    <form action="src/validar_login.php" method="POST">
        <!--
            Nota: el atributo name es importante, pues lo vamos a recibir de esa manera
            en PHP
        -->
        <input name="username" type="text" placeholder="Escribe tu nombre de usuario">
        <br><br>
        <input name="password" type="password" placeholder="Contraseña">
        <br><br>
        <!--Lo siguiente envía el formulario-->
        <input type="submit" value="Iniciar sesión">
    </form>
</body>