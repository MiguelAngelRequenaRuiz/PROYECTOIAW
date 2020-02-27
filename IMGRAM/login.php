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
            } elseif ($nombre == 'administrador') {
                session_start();
                $_SESSION['usuario'] = $usuario; 
                $_SESSION['estado'] = 'Autenticado';
                header('location: home_admin.php');
            } else {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['estado'] = 'Autenticado';
                header('location: home.php');
            }
                
            mysqli_close($conexion);
        ?>