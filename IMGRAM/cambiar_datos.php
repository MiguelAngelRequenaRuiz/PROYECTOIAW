<?php
    session_start();
    if (isset($_SESSION['usuario'])){
    } else {
        header('location: 403.html');
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

    <div class="pizq">
    <?php
            $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") or die("Problemas con la conexión");
            error_reporting(0);
            if ($_SESSION['usuario'] == 'administrador') {
                if ($usuario = $_REQUEST['usuario']){
                } else {
                    $usuario = $_GET['usu'];
                }
            } else {
                $usuario = $_SESSION['usuario'];
            }
            
            $registros = mysqli_query($conexion, "SELECT nombre_completo, correo FROM usuarios WHERE nombre='$usuario'")
            or die("Problemas en la consulta:".mysqli_error($conexion));

            echo "<table style='background-color: rgba(255, 255, 255, 0.767); border: 1px solid #e6e6e6cb; width:600px; text-align: center; margin-top: 30%'>";
            echo "<tr><th colspan='2' style='font-size:25px;border: 1px solid #e6e6e6; padding: 25px; background-color: rgb(255, 255, 255)'>Usuario: ". $usuario. "</th></tr>";
            while ($reg = mysqli_fetch_array($registros)) {
                    echo "<tr><td style='padding: 25px'>Nombre completo:</td><td>" . $reg['nombre_completo'] . "</td></tr>";
                    echo "<tr><td style='padding: 25px'>Correo electrónico:</td><td>" . $reg['correo'] . "</td></tr>";
            }
            echo "</table>";

            mysqli_close($conexion);
            
    ?> 

    </div>

    <div class="pder" >

      <div class="contenido" style="height: 600px">
        <div class="header" style="margin-bottom: 25px">
          <img src="imagenes/imgramlogo.png">
        </div>
        
        <div class="formulario">
            <form action="cambio_nombre.php" method="post">
                <h7>Nombre completo</h7>
                <input type="hidden" name="usuario" value="<?php echo $usuario;?>" />
                <input type="text" placeholder="Nuevo nombre" class=entrada-reg id="nombre" name="nombre" required/>
                <input type="submit" value="Cambiar nombre" class="boton-reg" name="cambiar" style="margin-top: 10px;margin-bottom: 30px"/>
            </form>
            <form action="cambio_correo.php" method="post">
                <h7>Correo electrónico</h7>
                <input type="hidden" name="usuario" value="<?php echo $usuario;?>" />
                <input type="email" placeholder="Nuevo correo" class=entrada-reg id="correo" name="correo" required/>
                <input type="submit" value="Cambiar correo" class="boton-reg" name="cambiar" style="margin-top: 10px;margin-bottom: 30px"/>
            </form>
            <form action="cambio_contrasena.php" method="post">
                <h7>Contraseña</h7>
                <input type="hidden" name="usuario" value="<?php echo $usuario;?>" />
                <input type="password" placeholder="Nueva contraseña" class=entrada-reg id="contrasena_new" name="contrasena_new" required/>
                
                <input type="submit" value="Cambiar contraseña" class="boton-reg" name="cambiar" style="margin-top: 10px;margin-bottom: 30px"/>
            </form>
            
            <?php
                if ($_SESSION['usuario'] != 'administrador') {
                } else {
                    echo "<form action='borrar_usuario.php?usu=".$usuario."' method='post'>";
                    echo "<input type='hidden' name='usuario' value='".$usuario."'/>";
                    echo "<input type='submit' value='Borrar el usuario: ".$usuario."' class='boton-reg' name='borrar' style='margin-bottom: 10px; background-color:#DF0101; border-color:#DF0101'/>";
                    echo "</form>";
                }
            ?>


          <button type="submit" class="boton-reg" OnClick="location.href=<?php
            if ($_SESSION['usuario'] == 'administrador') {
                echo "'"."home_admin.php"."'";
            } else {
                echo "'"."home_usuario.php"."'";
            }?>">Volver</button>
            
        </div>
      </div>
      </div>
    </div>

  </div>
  <footer id="footer">Diseñado por Christian Sosa y Miguel Requena.</footer>
</body>
</html>