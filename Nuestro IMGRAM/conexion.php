<?php

$mysqli = new mysqli("localhost", "root", "", "photogram"); //la bd debe llamarse REQUENASOSA y cambiar PHOTOGRAM por imgram

if($mysqli->connect_errno) {
	echo "Falló la conexión con la base de datos, disculpe las molestias.";
}

return $mysqli;


?>