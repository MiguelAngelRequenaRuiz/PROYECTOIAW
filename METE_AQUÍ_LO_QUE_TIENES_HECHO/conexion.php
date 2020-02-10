<?php

$mysqli = new mysqli("localhost", "root", "", "photogram");

if($mysqli->connect_errno) {
	echo "Falló la conexión con la base de datos, disculpe las molestias.";
}

return $mysqli;

?>