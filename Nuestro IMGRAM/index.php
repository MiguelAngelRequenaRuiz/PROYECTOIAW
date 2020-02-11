<?php
session_start();
if(isset($_SESSION['online']) && $_SESSION['online'] == TRUE) {
  header("Location: home.php");
}
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

  <div id="principal">

    <div class="pizq"><img src="imagenes/iconomovil.png"></div>

    <div class="pder">

      <?php 
      if(isset($_GET['error'])) {
        echo "<center>Error: Usuario o contraseña incorrecta.</center>";
      }
      ?>

      <?php
      if(isset($_POST['entrar'])) {

        require("conexion.php");

        $username = $mysqli->real_escape_string($_POST['usuario']);
        $password = md5($_POST['password']);

        $consulta = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";

        if($resultado = $mysqli->query($consulta)) {
          while($row = $resultado->fetch_array()) {

            $userok = $row['username'];
            $passok = $row['password'];
          }
          $resultado->close();
        }
        $mysqli->close();


        if(isset($username) && isset($password)) {

          if($username == $userok && $password == $passok) {

            session_start();
            $_SESSION['online'] = TRUE;
            header("Location: home.php");

          }

          else {

            Header("Location: index.php?error=login");

          }

        }


      }
      ?>

      <div class="contenido">
        <div class="header">
          <img src="imagenes/imgramlogo.png">
        </div>
        <div class="l-part">
          <form action="" method="post">
            <input type="text" placeholder="Usuario" class="input" name="usuario" />
            <div class="overlap-text">
              <input type="password" placeholder="Contraseña" class="input" name="password" />
              <a href="#">Quiero restablecer mi contraseña.</a>
            </div>
            <input type="submit" value="Entrar" class="btn" name="entrar" />
          </form>
        </div>
      </div>

      <div class="contenidobajo">
        <div class="partebaja">
          ¿Oye, no tienes cuenta? </br><a href="registro.php">Regístrate gratis</a>
        </div>
      </div>

      <center><img src="imagenes/appstores.png"></center>

    </div>

  </div>

</body>
</html>