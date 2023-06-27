<?php
// Incluir el archivo para verificar la sesión
include("../verificar_sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/generar.css">
    <title>Conusulta</title>
</head>
<body>
    <h1>Consulta de comprobantes</h1>
    <form action="qComprobantes.php" class="form" method="post">
        <label for="">Ingrese un RFC para ver sus comprobantes existentes</label><br>
        <input type="text" name="rfc" id="rfc"><br>
        <button type="submit" class="generar">CONSULTAR</button>
    </form>
</body>
</html>