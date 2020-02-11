<?php
//realizamos la conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "requenasosa"); //la bd debe llamarse REQUENASOSA
//localhost usuario passw bd
if($mysqli->connect_errno) {
	echo "Falló la conexión con la base de datos, disculpe las molestias.";
}

return $mysqli;


?>