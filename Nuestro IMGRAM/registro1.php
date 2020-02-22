<!DOCTYPE html>
<html lang="es">
<head>
  <title>IMGram</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
 
<body>

<div id="cont-princ">
  
  <div class="cont-sec">
    <div class="cabecera-reg">
      <img src="imagenes/imgramlogo.png" />
    </div>
    
    <form action="registro2.php" method="post" id="registro" name="registro">
    <div class="l-part">
      <input type="email" placeholder="Correo electrónico" class=entrada-reg id="correo" name="correo" />
      <div class="sobretexto">
        <input type="text" placeholder="Nombre completo" class=entrada-reg id="nombre" name="nombre" />
      </div>
      <div class="sobretexto">
        <input type="text" placeholder="Usuario" class=entrada-reg id="usuario" name="usuario" />
        <?php
                if (isset($_REQUEST["error"])) {
                    print "<p style='color: red'> $_REQUEST[error] </p>";
                }
				?>
      </div>
      <div class="sobretexto">
        <input type="password" placeholder="Contraseña" class=entrada-reg id="contrasena" name="contrasena"/>
      </div>
      <button class="boton-reg">Registrarse</button>
    </div>
    </form>
  </div>
  <div class="bajotexto">
    <div class="s-parte">
      ¿Tienes una cuenta? <a href="index.php">
      </br> Entrar a tu perfil</a>
    </div>
  </div>

</div>

</body>
</html>