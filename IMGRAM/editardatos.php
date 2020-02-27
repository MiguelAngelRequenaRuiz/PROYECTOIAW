<?php
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contrasena = trim(htmlspecialchars($_REQUEST["contrasena"], ENT_QUOTES, "UTF-8"));
    $correo = trim(htmlspecialchars($_REQUEST["correo"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "requenasosa") //cambia por admin xd
    or die("Problemas en la conexion");
    
    $consulta = "UPDATE usuarios SET nombre='$usuario', contrasena='$contrasena' 
                    WHERE correo='$correo'";
    
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
?>