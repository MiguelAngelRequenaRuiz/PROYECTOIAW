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
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
 
<body>

  <div id="principal">

    <div class="pizq"><img src="imagenes/iconomovil.png"></div>

    <div class="pder">

      <div class="contenido">
        <div class="header">
          <img src="imagenes/imgramlogo.png">
        </div>
        <div class="formulario">
            <form action="login.php" method="post">
              <input type="text" placeholder="Usuario" class="input" name="usuario" id="usuario" required />
              <input type="password" placeholder="Contraseña" class="input" name="contrasena" id="contrasena" required/>
              <?php 
                  if(isset($_GET['error'])) {
                    print "<p style='color: red'> $_REQUEST[error] </p>";
                  }
              ?>
            <input type="submit" value="Entrar" class="boton-reg" name="entrar" style="margin-top: 10px;margin-bottom: 15px"/>
              <a href="recuperacion.php"></br>He olvidado mi contraseña</a>
          </form>
          <button type="submit" class="boton-reg" style="margin-top: 15px" OnClick="location.href='invitado.php'">Entrar como invitado</button>
          <button type="submit" class="boton-reg" style="margin-top: 15px" OnClick="location.href='administrador.php'">Entrar como administrador</button>
        </div>
      </div>

      <div class="contenidobajo">
        <div class="partebaja">
          <p style="margin-left:25%" >¿Oye, no tienes cuenta? </br><a href="registro1.php">Regístrate gratis</a></p>
        </div>
      </div>

      <div class="plataformas"><img src="imagenes/appstores.png"></div>
    </div>

  </div>
  <footer id="footer">Diseñado por Christian Sosa y Miguel Requena</footer>

</body>
</html>
Copia antes de login.php 
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
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
 
<body>

  <div id="principal">

    <div class="pizq"><img src="imagenes/iconomovil.png"></div>

    <div class="pder">

      <?php
      if(isset($_POST['entrar'])) {

        require("conexion.php");

        $user = $mysqli->real_escape_string($_POST['usuario']);
        $password = md5($_POST['password']);
        $consulta = "SELECT nombre,contrasena FROM usuarios WHERE nombre = '$user' AND contrasena = '$password'";

        if($resultado = $mysqli->query($consulta)) {
          while($row = $resultado->fetch_array()) {

            $userok = $row['usuario'];
            $passok = $row['password'];
          }
          $resultado->close();
        }
        $mysqli->close();


        if(isset($user) && isset($password)) {

          if($user == $userok && $password == $passok) {
            session_start();
            $_SESSION['online'] = TRUE;
            header("Location: home.php");
          }
          else {
            Header("Location: index.php?error=El usuario y la contraseña no coinciden.");
          }
        }
      }
      ?>

      <div class="contenido">
        <div class="header">
          <img src="imagenes/imgramlogo.png">
        </div>
        <div class="formulario">
            <form action="" method="post">
              <input type="text" placeholder="Usuario" class="input" name="usuario" id="usuario" required />
              <input type="password" placeholder="Contraseña" class="input" name="contrasena" id="contrasena" required/>
              <?php 
                  if(isset($_GET['error'])) {
                    print "<p style='color: red'> $_REQUEST[error] </p>";
                  }
              ?>
            <input type="submit" value="Entrar" class="boton-reg" name="entrar" style="margin-top: 10px;margin-bottom: 15px"/>
              <a href="recuperacion.php"></br>He olvidado mi contraseña</a>
          </form>
          <button type="submit" class="boton-reg" style="margin-top: 15px" OnClick="location.href='invitado.php'">Entrar como invitado</button>
          <button type="submit" class="boton-reg" style="margin-top: 15px" OnClick="location.href='administrador.php'">Entrar como administrador</button>
        </div>
      </div>

      <div class="contenidobajo">
        <div class="partebaja">
          <p style="margin-left:25%" >¿Oye, no tienes cuenta? </br><a href="registro1.php">Regístrate gratis</a></p>
        </div>
      </div>

      <div class="plataformas"><img src="imagenes/appstores.png"></div>
    </div>

  </div>
  <footer id="footer">Diseñado por Christian Sosa y Miguel Requena</footer>

</body>
</html>

