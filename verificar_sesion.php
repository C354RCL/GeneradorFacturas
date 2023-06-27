<?php
session_start();

// Verificar si la variable de sesión 'usuario' no existe o está vacía
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    // Redirigir a la página de inicio de sesión u otra página adecuada
    header("Location: ../public/index.php");
    exit; // Detener la ejecución del resto de la página
}

// Obtener el valor de la variable de sesión 'usuario'
$usuario = $_SESSION['usuario'];
?>
