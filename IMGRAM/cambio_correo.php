<?php
    session_start();
	if (isset($_SESSION['usuario'])){
    } else {
		header('location: 403.html');
	}
    $usuario = $_REQUEST["usuario"];
    $correo = trim(htmlspecialchars($_REQUEST["correo"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
        or die("Problemas en la conexion");

    $actualizacion = "UPDATE usuarios SET correo='$correo' WHERE nombre = '$usuario'";
        mysqli_query($conexion, $actualizacion) or die(mysqli_error($conexion));
        header('location: cambiar_datos.php?usu='.$usuario);

    mysqli_close($conexion);

?>

