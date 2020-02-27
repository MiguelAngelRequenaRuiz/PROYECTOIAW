<?php 
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Tu galería</title>
  </head>
  <body text="black">
  <div id="editdatos" class="modal fade" style="color: black">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Editar perfil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="editardatos.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" value="<?php 
								session_start();
								print $_SESSION['usuario'];
							?>" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Contraseña" id="contrasena" name="contrasena" required="required">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" id="correo" name="correo" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Iniciar Sesión">
					</div>
				</form>			
			</div>
		</div>
	</div>
</div> 

<div class="container" >
			<div class="logo" style="position: relative; float: left; width: 300px">
			<img src="imagenes/imgramlogo.png">
		</div>
			<div style="position: relative; float: right; padding-left: 15px; padding-top: 15px; width: 150px">
				<p>Usuario actual: <?php
								print $_SESSION['usuario'];
							?></p>
			</div>
			<div style="position: relative; float: right; padding-top: 15px; width: 150px">
                <a href="formfoto.php" class="btn btn-primary btn-lg">Subir foto</a>
			</div>
			<div style="position: relative; float: right; padding-top: 15px; width: 150px">
                <a href="logout.php" class="btn btn-primary btn-lg">Salir</a>
			</div>

			<div style="position: relative; float: right; padding-top: 15px; width: 150px"><a href="#editdatos" class="btn btn-primary btn-lg" data-toggle="modal">Editar perfil</a>           
			 	<?php
                if (isset($_REQUEST["error"])) {
                    print "<p style='color: red'> $_REQUEST[error] </p>";
                }
				?>
			</div>
			
			<div style="position: relative; clear: both">
			<br/><br/>
            <form action="home.php" method="post">
			<table style="border: 0px"class="table">
					<tr>
						<td>
							<div class="form-group">
                    			<label style="color: black" for="fechasubida" >Fecha: </label>
                    			<input type="date" class="form-control" name="fechasubida" id="fechasubida">
							</div>
						</td>
						<td>
							<div>
                    			<input style="height: 70px; width: 300px; margin-right: -240px" type="submit" class="btn btn-primary btn-block" value="Buscar imágenes">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
                    			<label style="color: black" for="idusufoto">Usuario: </label>
                    			<select name="idusufoto" id="idusufoto" class="form-control">
							</div> 
								<option value=""></option>
								<?php
								$conexion = mysqli_connect("localhost", "root", "", "requenasosa") 
									or die("Problemas de conexion");

								$registros = mysqli_query($conexion, "SELECT DISTINCT usuario FROM fotos ORDER BY usuario")
									or die("Problemas en el select".mysqli_error($conexion));

								while ($reg = mysqli_fetch_array($registros)) {
									echo "<option value='$reg[usuario]'>$reg[usuario]</option>";
								}
							?>
      						</select>
						</td>
						<td>
							<div>
                    			<input style="height: 75px" type="reset" class="btn btn-primary btn-block" value="Reiniciar">
							</div>
						</td>
					</tr>
				</table> 
			</form>
			

<?php
$conexion = mysqli_connect("localhost", "root", "", "requenasosa") or die("Problemas con la conexión.");
if (isset($_REQUEST["idusufoto"])) {
	$autor = trim(htmlspecialchars($_REQUEST["idusufoto"], ENT_QUOTES, "UTF-8"));
}
if (isset($_REQUEST["idusufoto"]) && !empty($_REQUEST["idusufoto"])) {
	$registros = mysqli_query($conexion, "SELECT usuario, id, fecha FROM imagenes WHERE usuario='$autor'")
    or die("Problemas en la consulta.".mysqli_error($conexion));
} else {
	$registros = mysqli_query($conexion, "SELECT usuario, id, fecha FROM imagenes ORDER BY fecha")
    or die("Problemas en la consulta.".mysqli_error($conexion));
}

echo "<table class='table table-striped' style='background-color: white'>";
echo "<tr><th>Usuario</th><th>Foto</th><th>Fecha</th>";
while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>";
        echo "<td>" . $reg['usuario'] . "</td>";
        echo "<td>" . "<img src='usuarios\\".$reg['usuario']."\\".$reg['id'].".jpg'/>" . "</td>";
        echo "<td>" . $reg['fecha'] . "</td>";
    echo "</tr>";
}
echo "</table>";
                
mysqli_close($conexion);
?>
</div>
<a href="logout.php">Salir de la app.</a>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

