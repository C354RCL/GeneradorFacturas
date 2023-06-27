<?php
// Incluir el archivo para verificar la sesión
include("../verificar_sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/menu.css">
    <title>Usuario</title>
</head>
<body>
    <h1>BIENVENIDO</h1>
    <div class="container2">
        <div class="card2">
            <a href="../inserts/Comprobantes.php">
                <img src="./img/crear.png" alt="">
                <h2>Generar</h2>
            </a>
        </div>

        <div class="card2">
            <a href="qComprobantesUsuario.php">
                <img src="./img/consulta.png" alt="">
                <h2>Consultar</h2>
            </a>
        </div>
        
    </div>
    
    <div class="container2">
        <div class="card2">
            <a href="eliminarUsuario.php">
                <img src="./img/eliminar.png" alt="">
                <h2>Eliminar</h2>
            </a>
        </div>

    </div>
</body>
</html>