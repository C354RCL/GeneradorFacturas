<?php
// Incluir el archivo para verificar la sesión
include("../verificar_sesion.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/generar.css">
        <title>Generar Comprobante</title>
    </head>
    <body>
    <h1>Generar un comprobante</h1>
    <form action="../GenerarComprobante.php" action="../generarXml.php" class="form" method="post">
        <label for="">Ingrese el folio del comprobante a generar</label><br>
        <input type="text" name="folio" id="folio">
        <button type="submit" class="generar">Generar</button>
    </form>
</body>
</html>