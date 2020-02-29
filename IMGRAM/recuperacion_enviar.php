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

        <div class="l-part">
            <?php
                // Para que esto funcione debe tener instalado un servidor SMTP en el servidor
                //Para que no aparezca un fallo por no tenerlo instalado pongo la siguiente linea
                error_reporting(0);

                $nombre= $_POST['nombre'];
                $correo= $_POST['correo'];
                $usuario= $_POST['usuario'];
                $header = 'From: ' . $mail . "\r\n";
                $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
                $header .= "Mime-Version: 1.0 \r\n";
                $header .= "Content-Type: text/plain";

                $mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n";
                $mensaje .= "Su e-mail es: " . $correo . " \r\n";
                $mensaje .= "Su usuario es: " . $usuario . " \r\n";
                $mensaje .= "Enviado el " . date('d/m/Y', time());

                $para = "admin@imgram.com";
                $asunto = "Recuperación de contraseña del usuario " . $usuario;

                mail($para, $asunto, utf8_decode($mensaje), $header);
                echo "<p>" ."Un administrador de IMGRAM se pondrá en contacto con usted en las siguientes 48h" . "</p>";
                echo "</br>"

            ?>
                <div class="sobretexto">
                    <button type="submit" class="boton-reg" OnClick="location.href='index.php'">Volver</button>
                </div>
        </div>    
    </div>
</div>
</body>
</html>


