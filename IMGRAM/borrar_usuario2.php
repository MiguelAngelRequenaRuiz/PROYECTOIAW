<?php
    session_start();
    if (isset($_SESSION['usuario'])){
    } else {
        header('location: 403.html');
    }
    
    $usuario = $_GET['usu'];

    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa")
    or die("Problemas en la conexion");
    $borrar_ima = "DELETE FROM imagenes WHERE nombre_usuario='$usuario'";
    

    $borrar_usu = "DELETE FROM usuarios WHERE nombre='$usuario'";
    
    $carpeta = "imagenes/".$usuario;
    array_map('unlink', glob("$carpeta/*"));
        rmdir($carpeta);
    $borrado_ima = mysqli_query($conexion, $borrar_ima) or die(mysqli_error($conexion));
    $borrado_usu = mysqli_query($conexion, $borrar_usu) or die(mysqli_error($conexion));
    mysqli_close($conexion);
    header('location: home_admin.php');
?>