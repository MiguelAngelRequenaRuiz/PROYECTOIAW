<?php
    session_start();
    if (isset($_SESSION['usuario'])){
    } else {
        header('location: 403.html');
    }
    $usuario = $_SESSION['usuario'];
    $fecha = date('d-m-Y');
    $imagen = substr($_FILES["imagen"]["name"],0 ,strlen($_FILES["imagen"]["name"])-4);
    $ubicacion = "imagenes/".$usuario."/".$imagen."_". date('d-m-Y_H_i_s'). ".jpg";
    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") or die("Problemas con la conexión");
    $insertar = "INSERT INTO imagenes (nombre_usuario, fecha, imagen, ubicacion) VALUES ('$usuario', '$fecha', '$imagen', '$ubicacion')";
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ubicacion);
    mysqli_query($conexion, $insertar) or die(mysqli_error($conexion));
    header('location: home_usuario.php');
?>