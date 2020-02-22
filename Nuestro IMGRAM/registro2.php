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
      echo "<p>"."Pinche " . "<a href='index.php'>"."AQUI". "</a>"." para volver a la página principal"."</p>";

    } else {
        header('location: registro1.php?error=El usuario ya existe, elija otro por favor');
        echo "El nombre " . $nombre . " ya existe, elija otro nombre";
    }
        
    mysqli_close($conexion);
?>