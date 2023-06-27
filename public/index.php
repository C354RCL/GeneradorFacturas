<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/index.css" />
    <title>Inicio de sesion</title>
  </head>
  <body>
    <div class="container">
      <h1>INICIO DE SESION</h1>
      <form action="fAcces.php" class="form" method="post" enctype="multipart/form-data">
        <label for="">RFC</label><br>
        <input type="text" name="rfc" id="rfc" /> <br />

        <label for="">CONTRASEÑA</label><br>
        <input type="password" name="pwd" id="pwd" /> <br />

        <label for="">KEY</label><br>
        <input type="file" name="file"/> <br />

        <button type="submit">ENTRAR</button>
      </form>
    </div>
  </body>
</html>
