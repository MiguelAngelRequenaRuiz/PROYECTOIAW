<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));
    $fecha = date('Y-m-d');
    $conexion = mysqli_connect("localhost", "root", "", "requenasosa")
    or die("Problemas en la conexion.");

    $consulta = "SELECT nombre FROM fotos WHERE usuario='$usuario'";

    $inserfoto = "INSERT INTO fotos (id, fecha, usuario) VALUES ('$id', '$fecha', '$usuario')";

    move_uploaded_file($_FILES["foto"]["tmp_name"], "usuarios\\".$usuario."\\".$id.".jpg");
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        mysqli_query($conexion, $inserfoto) or die(mysqli_error($conexion));
    }
    
    header('location: usuario.php');
?>