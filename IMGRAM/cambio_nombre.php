<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $nombre = trim(htmlspecialchars($_REQUEST["nombre"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
        or die("Problemas en la conexion");

    $actualizacion = "UPDATE usuarios SET nombre_completo='$nombre' WHERE nombre = '$usuario'";
        mysqli_query($conexion, $actualizacion) or die(mysqli_error($conexion));
        header('location: cambiar_datos.php');

    mysqli_close($conexion);

?>