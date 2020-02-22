<!DOCTYPE html>
<html lang="es">

<head>
  <title>Registro</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<div id="cont-princ">
  
    <div class="cont-sec">
        <div class="cabecera-reg">
        <img src="imagenes/imgramlogo.png" />
        </div>

        <div class="l-part">
        <?php
            $nombre = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
            $correo = trim(htmlspecialchars($_REQUEST["correo"], ENT_QUOTES, "UTF-8"));

            $nombre_completo = trim(htmlspecialchars($_REQUEST["nombre"], ENT_QUOTES, "UTF-8"));
            $contrasena_req = trim(htmlspecialchars($_REQUEST["contrasena"], ENT_QUOTES, "UTF-8"));
            $contrasena = '';
            $contrasena_hash = hash('sha256',  $contrasena_req . hash('sha256', $contrasena .  $contrasena_req));

            $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
            or die("Problemas en la conexion");


            $insercion = "INSERT INTO usuarios (nombre, contrasena, correo, nombre_completo)
                                VALUES ('$nombre', '$contrasena', '$correo', '$nombre_completo')";

            if (mysqli_query($conexion, $insercion)) {
              echo "<p>"."El registro se ha realizado de forma exitosa"."</p>";
              echo "</br>";
            } else {
                header('location: registro1.php?error=El usuario ya existe, elija otro por favor');
            }
                
            mysqli_close($conexion);
        ?>
        <div class="sobretexto">
            <button type="submit" class="boton-reg" OnClick="location.href='index.php'">Volver</button>
        </div>
            
        </div>
        </form>
    </div>
</body>
</html>
<?php

?>