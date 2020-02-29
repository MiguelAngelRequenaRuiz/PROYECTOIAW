<!DOCTYPE html>
<html lang="es">

<head>
  <title>Recuperación de contraseña</title>
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

        <form action="recuperacion_enviar.php" method="post" id="recuperacion" name="recuperacion">
                <!--Esto envía un correo con los datos de la cuenta a los adminstradores de IMGRAM 
                    que son los que decidirán restablecer la contraseña-->
            <div class="l-part">
                <input type="email" placeholder="Correo electrónico" class=entrada-reg id="correo" name="correo" required/>
            </div>
            <div class="sobretexto">
                <input type="text" placeholder="Nombre completo" class=entrada-reg id="nombre" name="nombre" required/>
            </div>
            <div class="sobretexto">
                <input type="text" placeholder="Usuario" class=entrada-reg id="usuario" name="usuario" required/>
            </div>
            <button class="boton-reg">Recuperar contraseña</button>
        </form>
    </div>
</div>
<footer id="footer">Diseñado por Christian Sosa y Miguel Requena.</footer>
</body>
</html>