<?php
// Incluir el archivo para verificar la sesión
include("../verificar_sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/eliminar.css">
    <title>Eliminar</title>
</head>
<body>
    <h1>Eliminar un Comprobante</h1>
    <form action="qEliminar.php" class="form" method="post">
        <label for="">Ingrese el folio del comprobante a eliminar</label><br>
        <input type="text" name="folio" id="folio">
        <button type="submit" id="eliminar">ELIMINAR</button>
    </form>
</body>
</html>