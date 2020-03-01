<?php
    session_start();
    $usuario = $_GET['usu'];

    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa")
    or die("Problemas en la conexion");
    $borrar_ima = "DELETE FROM imagenes WHERE nombre_usuario='$usuario'";
    $borrado_ima = mysqli_query($conexion, $borrar_ima) or die(mysqli_error($conexion));

    $borrar_usu = "DELETE FROM usuarios WHERE nombre='$usuario'";
    $borrado_usu = mysqli_query($conexion, $borrar_usu) or die(mysqli_error($conexion));
    mysqli_close($conexion);
    header('location: home_admin.php');



?>