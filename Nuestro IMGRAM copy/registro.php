<?php
$db_host="localhost";
$db_user="nombre_de_usuario";
$db_password="contraseña";
$db_name="nombre_de_base_de_datos";
$db_table_name="nombre_de_tabla";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);

$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');
}

mysql_close($db_connection);

/*---------------------------------------------------------------------------------------*/

    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contrasena = trim(htmlspecialchars($_REQUEST["contraseña"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "estacion")
    or die("Problemas en la conexion");
    
    $consulta = "SELECT * FROM administradores WHERE Usuario='$usuario' AND Contrasena='$contrasena'";
    
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $count = mysqli_num_rows($registros);
    if ($count != 1) {
        header('location: inicio.php?error=Usuario o Contraseña Incorrecta');
    } else {
        session_start();
        $_SESSION['nombreUsuario'] = $usuario; 
        $_SESSION['estado'] = 'Autenticado';
        header('location: administracion.php');
        
    mysql_close($db_connection);

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>IMGram</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
 
<body>
<!-- MEJOR CREAR NUEVOS ID Y CLASS PARA CSS EN ESTA ZONA,
PORQUE AL HABER EDITADO LAS IMGS EN INDEX ESTO SE HA JODIDO
UN POCO XD
TENGO QUE HACER COSAS DE FRANCÉS YA SI LO VES Y TE HACE
LO TOCAS TÚ -->
<div id="principal">
  
  <div class="contenido">
    <div class="header">
      <img src="imagenes/imgramlogo.png" />
    </div>
    <form action="" method="post">
    <div class="pizq">
      <input type="text" placeholder="Correo electrónico" class="input" />
      <div class="texto">
        <input type="text" placeholder="Nombre completo" class="input" />
      </div>
      <div class="texto">
        <input type="text" placeholder="Usuario" class="input" />
      </div>
      <div class="texto">
        <input type="password" placeholder="Contraseña" class="input" />
      </div>
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos.
      </label>
    </div>
      <input type="button" value="Registrarte" class="boton" />
    </div>
    </form>
  </div>
  <div class="contenidobajo">
    <div class="partebaja">
      ¿Tienes una cuenta? <a href="index.php">Entrar a mi perfil</a>
    </div>
  </div>

</div>

</body>
</html>
