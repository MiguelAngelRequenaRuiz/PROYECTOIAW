<?php
    $usuario = $_REQUEST["usuario"];

    $contrasena_req_new = trim(htmlspecialchars($_REQUEST["contrasena_new"], ENT_QUOTES, "UTF-8"));
    $contrasena_hash_new = hash('sha256',  $contrasena_req_new);

    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
        or die("Problemas en la conexion");

    $actualizacion = "UPDATE usuarios SET contrasena='$contrasena_hash_new' WHERE nombre = '$usuario'";
    
        mysqli_query($conexion, $actualizacion) or die(mysqli_error($conexion));
        header('location: cambiar_datos.php?usu='.$usuario);

    mysqli_close($conexion);

?>