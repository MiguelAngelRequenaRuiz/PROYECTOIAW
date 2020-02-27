<?php
    session_start();
    $id =$_REQUEST["id"];
    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
    or die("Problemas en la conexion");
    $borrar = "DELETE FROM imagenes WHERE id='$id'";
    $borrado = mysqli_query($conexion, $borrar) or die(mysqli_error($conexion));
    header('location: home_usuario.php');
?>