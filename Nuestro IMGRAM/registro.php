<!DOCTYPE html>
<html lang="es">
<head>
  <title>IMGram</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
 
<body>
<!-- MEJOR CREAR NUEVOS ID Y CLASS PARA CSS EN ESTA ZONA,
PORQUE AL HABER EDITADO LAS IMGS EN INDEX ESTO SE HA JODIDO
UN POCO XD
TENGO QUE HACER COSAS DE FRANCÉS YA SI LO VES Y TE HACE
LO TOCAS TÚ -->
<div id="principal">
  
  <div class="contenido">
    <div class="header">
      <img src="imagenes/imgramlogo.png" />
    </div>
    <form action="" method="post">
    <div class="pizq">
      <input type="text" placeholder="Correo electrónico" class="input" />
      <div class="texto">
        <input type="text" placeholder="Nombre completo" class="input" />
      </div>
      <div class="texto">
        <input type="text" placeholder="Usuario" class="input" />
      </div>
      <div class="texto">
        <input type="password" placeholder="Contraseña" class="input" />
      </div>
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos.
      </label>
    </div>
      <input type="button" value="Registrarte" class="boton" />
    </div>
    </form>
  </div>
  <div class="contenidobajo">
    <div class="partebaja">
      ¿Tienes una cuenta? <a href="index.php">Entrar a mi perfil</a>
    </div>
  </div>

</div>

</body>
</html>