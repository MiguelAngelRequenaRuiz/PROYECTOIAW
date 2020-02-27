<?php
    session_start()
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

    <div class="pizqh">
    <?php
            
            $conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") or die("Problemas con la conexión");
            $usuario = $_SESSION['usuario'];

            $registros = mysqli_query($conexion, "SELECT nombre_usuario, imagen, fecha, id FROM imagenes WHERE nombre_usuario='$usuario' ORDER BY fecha")
            or die("Problemas en la consulta:".mysqli_error($conexion));

            echo "<table>";
            echo "<tr><th>Id</th><th>Foto</th><th>Fecha</th>";
            while ($reg = mysqli_fetch_array($registros)) {
                echo "<tr>";
                    echo "<td class='td1'>" . $reg['id'] . "</td>";
                    echo "<td class='td1'>" . "<img src='usuarios\\".$reg['nombre_usuario']."\\".$reg['imagen'].".jpg'/>" . "</td>";
                    echo "<td class='td1'>" . $reg['fecha'] . "</td>";
                echo "</tr>";
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
            <button type="submit" class="boton-reg" OnClick="location.href='cambiar_datos.php'" style="margin-bottom: 10px">Editar mi perfil</button>
            <form action="borrar_imagenes.php" method="post">
                <h7>Seleccione la id para borrar la foto</h7>
                <select name="id" id="id" class="input"> 
                            <option value=""></option>
							<?php
								$conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
									or die("Problemas de conexion");

								$registros = mysqli_query($conexion, "SELECT id FROM imagenes WHERE nombre_usuario='$usuario' ORDER BY fecha")
									or die("Problemas en el select".mysqli_error($conexion));

								while ($reg = mysqli_fetch_array($registros)) {
									echo "<option value='$reg[id]'>$reg[id]</option>";
								}
                            ?>
                            
      		    </select>

            <input type="submit" value="Borrar" class="boton-reg" name="borrar" style="margin-top: 10px;margin-bottom: 30px"/>
          </form>

          <form action="agregar_imagenes.php" method="post">
                <h7>Seleccione una imagen para subirla</h7>
                <input type="file" class="input" name="imagen" id="imagen" style="border:none" required/>
                <input type="submit" value="Subir" class="boton-reg" name="Subir" style="margin-top: 10px;margin-bottom: 30px"/>
          </form>

          <button type="submit" class="boton-reg" OnClick="location.href='index.php'">Cerrar sesión </br> ( <?php echo $usuario; ?> )</button>
            
        </div>
      </div>

      </div>

    </div>

  </div>
  <footer id="footer">Diseñado por Christian Sosa y Miguel Requena</footer>
</body>
</html>