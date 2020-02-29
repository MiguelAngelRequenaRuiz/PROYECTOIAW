<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $contrasena_req_old = trim(htmlspecialchars($_REQUEST["contrasena_old"], ENT_QUOTES, "UTF-8"));
    $contrasena_hash_old = hash('sha256',  $contrasena_req_old);

    $contrasena_req_new = trim(htmlspecialchars($_REQUEST["contrasena_new"], ENT_QUOTES, "UTF-8"));
    $contrasena_hash_new = hash('sha256',  $contrasena_req_new);

    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
        or die("Problemas en la conexion");

    $consulta = "SELECT contrasena FROM usuarios WHERE nombre='$usuario'";

    $actualizacion = "UPDATE usuarios SET contrasena='$contrasena_hash_new' WHERE nombre = '$usuario'";

    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $contador = mysqli_num_rows($registros);
    if ($contador != 1) {
        header('location: cambiar_datos.php?error=La contraseña es incorrecta');
    } else {
        mysqli_query($conexion, $actualizacion) or die(mysqli_error($conexion));
        header('location: cambiar_datos.php');
    }

    mysqli_close($conexion);

?>