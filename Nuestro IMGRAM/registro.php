<?php

    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $correo = trim(htmlspecialchars($_REQUEST["correo"], ENT_QUOTES, "UTF-8"));
    $nombre = trim(htmlspecialchars($_REQUEST["nombre"], ENT_QUOTES, "UTF-8"));
    $contrasena_req = trim(htmlspecialchars($_REQUEST["contrasena"], ENT_QUOTES, "UTF-8"));
    $contrasena = '';
    $contrasena_hash = hash('sha256',  $contrasena_req . hash('sha256', $contrasena .  $contrasena_req));

    $conexion = mysqli_connect("localhost", "admin", "", "mysql") 
    or die("Problemas en la conexion");
    
    $insercion = "INSERT INTO usuarios (usuario, contrasena, correo, nombre)
                  VALUES ($usuario, $contrasena, $correo, $nombre)";
    
    $registros = mysqli_query($conexion, $insercion) or die(mysqli_error($conexion));
    $count = mysqli_num_rows($registros);

    if (mysqli_query($conexion, $insercion)) {
      echo "Los datos han sido guardados correctamente";
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