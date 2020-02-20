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
    
    /*
            $comprobar = "SELECT nombre FROM usuarios WHERE nombre = '$nombre'";
    mysqli_query($conexion, $comprobar);
    echo $comprobar;

    if (mysqli_query($conexion, $comprobar)) {
        echo "No puede usar el nombre '" . $nombre . "' porque ya está siendo usado.";
    } else {
        if (mysqli_query($conexion, $insercion)) {
            echo "Los datos han sido guardados correctamente";
          } else {
                echo "Error: " . $insercion . "<br>" . mysqli_error($conexion);
          }
    }    
    */
    
    /*
    $insercion = mysqli_query($conexion, "INSERT INTO usuarios (nombre, contrasena, correo, nombre_completo)
                                VALUES ('$nombre', '$contrasena', '$correo', '$nombre_completo')")
                                 or die("Problemas en el insert".mysqli_error($conexion));

    mysqli_query($conexionv, "INSERT INTO estaciones (Marca, Modelo, IP, Tipo_Conex, Ubi) 
            VALUES ('$marca', '$modelo', '$ip', '$tconexion', '$ubicacion')") 
                or die("Problemas en el insert".mysqli_error($conexionv));
    */

    //$registros = mysqli_query($conexion, $insercion) or die(mysqli_error($conexion));

    if (mysqli_query($conexion, $insercion)) {
      echo "<p>"."El registro se ha realizado de forma exitosa"."</p>";
      echo "<p>"."Pinche " . "<a href='index.php'>"."AQUI". "</a>"." para volver a la página principal"."</p>";

    } else {
          echo "Error: " . $insercion . "<br>" . mysqli_error($conexion);
    }

    /*
    if ($count != 1) {
        header('location: inicio.php?error=Usuario o Contraseña Incorrecta');
    } else {
        session_start();
        $_SESSION['nombreUsuario'] = $usuario; 
        $_SESSION['estado'] = 'Autenticado';
        header('location: administracion.php');
    }
    */
        
    mysqli_close($conexion);
?>