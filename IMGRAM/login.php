<!DOCTYPE html>
<html lang="es">

<head>
  <title>Login</title>
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
            $nombre = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
            $contrasena_req = trim(htmlspecialchars($_REQUEST["contrasena"], ENT_QUOTES, "UTF-8"));
            $contrasena_hash = hash('sha256',  $contrasena_req);

            $conexion = mysqli_connect("localhost", "root", "", "requenasosa") 
            or die("Problemas en la conexion");

            $consulta = "SELECT nombre, contrasena FROM usuarios WHERE nombre='$nombre' AND contrasena='$contrasena_hash'";
            $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
            $contador = mysqli_num_rows($registros);
            if ($contador != 1) {
                header('location: index.php?error=Usuario o contraseña incorrectos');
            } else {
                echo "funciona";
            }
                
            mysqli_close($conexion);
        ?>
        <div class="sobretexto">
            <button type="submit" class="boton-reg" OnClick="location.href='index.php'">Volver</button>
        </div>
            
        </div>
        </form>
    </div>
</body>
</html>