<?php
    session_start();
    if (isset($_SESSION['usuario'])){
    } else {
        header('location: 403.html');
    }
    $id =$_REQUEST["id"];
    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa")
    or die("Problemas en la conexion");
    $borrar = "DELETE FROM imagenes WHERE id='$id'";
    $consulta = "SELECT ubicacion FROM imagenes WHERE id = '$id'";
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $reg = mysqli_fetch_array($registros);
    $ubicacion= $reg['ubicacion'];
    
    if ($_SESSION['usuario'] == 'administrador') {
        unlink("$ubicacion");
        $borrado = mysqli_query($conexion, $borrar) or die(mysqli_error($conexion));
        header('location: home_admin.php');
    } else {
        unlink("$ubicacion");
        $borrado = mysqli_query($conexion, $borrar) or die(mysqli_error($conexion));
        header('location: home_usuario.php');
    }

?>
