<?php
// Incluir el archivo para verificar la sesión
include("../verificar_sesion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/menu.css ">
    <title>Administrador</title>
</head>
<body>
    <h1>BIENVENIDO</h1>
    <div class="container">
        <div class="card">
            <a href="consultar.php">
                <img src="./img/consulta.png" alt="">
                <h2>Consultar</h2>
            </a>
        </div>
        
        <div class="card">
            <a href="./eliminar.php">
                <img src="./img/eliminar.png" alt="">
                <h2>Eliminar</h2>
            </a>
        </div>
    </div>
</body>
</html>