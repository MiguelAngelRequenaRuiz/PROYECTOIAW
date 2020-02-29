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
            if (isset($_REQUEST["usuario"])) {
                $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
            }
            if (isset($_REQUEST["usuario"]) && !empty($_REQUEST["usuario"])) {
                $registros = mysqli_query($conexion, "SELECT nombre_usuario, ubicacion, fecha FROM imagenes WHERE nombre_usuario='$usuario' ORDER BY fecha")
                or die("Problemas en la consulta:".mysqli_error($conexion));
            } else {
                $registros = mysqli_query($conexion, "SELECT nombre_usuario, ubicacion, fecha FROM imagenes ORDER BY fecha")
                or die("Problemas en la consulta:".mysqli_error($conexion));
            }

            echo "<table>";
            echo "<tr><th>Usuario</th><th>Foto</th><th>Fecha</th>";
            while ($reg = mysqli_fetch_array($registros)) {
                echo "<tr>";
                    echo "<td class='td1'>" . $reg['nombre_usuario'] . "</td>";
                    echo "<td class='td1'>" . "<img src='usuarios\\".$reg['nombre_usuario']."\\".$reg['ubicacion'].".jpg'/>" . "</td>";
                    echo "<td class='td1'>" . $reg['fecha'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
                            
            mysqli_close($conexion);
            
    ?> 

    </div>

    <div class="pder">

      <div class="contenido">
        <div class="header" style="margin-bottom: 25px">
          <img src="imagenes/imgramlogo.png">
        </div>
        <div class="formulario">
            <form action="home_imagenes.php" method="post">
                <h7>Filtro de búsqueda</h7>
                <select name="usuario" id="usuario" class="input"> 
                            <option value=""></option>
							<?php
								$conexion = mysqli_connect("localhost", "admin", "1234", "requenasosa") 
									or die("Problemas de conexion");

								$registros = mysqli_query($conexion, "SELECT DISTINCT nombre_usuario FROM imagenes ORDER BY nombre_usuario")
									or die("Problemas en el select".mysqli_error($conexion));

								while ($reg = mysqli_fetch_array($registros)) {
									echo "<option value='$reg[nombre_usuario]'>$reg[nombre_usuario]</option>";
								}
                            ?>
                            
      		    </select>
              <input type="date" name="fecha" id="fecha" class="input"/>

            <input type="submit" value="Buscar" class="boton-reg" name="buscar" style="margin-top: 10px;margin-bottom: 30px"/>
          </form>
          <button type="submit" class="boton-reg" OnClick="location.href='index.php'">Volver</button>

        </div>
      </div>

      </div>

    </div>

    
  </div>
  <footer id="footer">Diseñado por Christian Sosa y Miguel Requena</footer>
</body>
</html>