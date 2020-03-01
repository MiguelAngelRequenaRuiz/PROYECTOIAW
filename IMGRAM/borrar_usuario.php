<?php 
    session_start();
    $usuario =$_GET['usu']
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

<div id="cont-princ">
  
  <div class="cont-sec">
    <div class="cabecera-reg">
      <img src="imagenes/imgramlogo.png" />
    </div>
    
    <div class="l-part" style="height: 100px">

        <h4>Está seguro de que desea eliminar al usuario: <?php echo $usuario ?></h4>
        <p>La eliminación será irreversible</p>
        <button class="boton-reg" style="width: 100px; float:left; margin-top:20px" OnClick="location.href='borrar_usuario2.php?usu=<?php echo $usuario?>'">Aceptar</button>
        <button class="boton-reg" style="width: 100px; float:right; margin-top:20px" OnClick="location.href='cambiar_datos.php?usu=<?php echo $usuario?>'">Cancelar</button>
    </div>
  </div>

</div>

<footer id="footer">Diseñado por Christian Sosa y Miguel Requena.</footer>
</body>
</html>