<?php
<<<<<<< Updated upstream
session_start();

$rfc = $_POST['rfc'];
$pwd = $_POST['pwd'];
=======
    $rfc = $_POST['rfc'];
    $pwd = $_POST['pwd'];
    $archivo = $_FILES['llave'];
    $llave = fgets($archivo);
    include("../Controlador.php");

    $con = Conectar();
    $sql = "SELECT * FROM cuentas WHERE rfc = '$rfc';";
    $result = Ejecutar($con, $sql);
    
    $nFilas = mysqli_num_rows($result);
    
    $rfc = mysqli_real_escape_string($con, $rfc);
    $pwd = mysqli_real_escape_string($con, $pwd);
    if($nFilas == 1){
        print("\nEl usuario existe\n");
        $fila=mysqli_fetch_row($result);
        if($pwd == $fila[1]){
            // print("\nContraseña correcta\n");
            if($fila[3] == 1){
                // print("\nLa cuenta esta activa\n");
>>>>>>> Stashed changes

include("../Controlador.php");

$con = Conectar();
$sql = "SELECT * FROM cuentas WHERE rfc = '$rfc'";
$result = Ejecutar($con, $sql);

$nFilas = mysqli_num_rows($result);

if ($nFilas == 1) {
    $fila = mysqli_fetch_row($result);

    // Condición de contraseña correcta
    if ($pwd == $fila[1]) {

        // Condición de cuenta activa
        if ($fila[3] == 1) {

            // Condición si la contraseña no está bloqueada
            if ($fila[4] == 0) {

                $sql4 = "UPDATE cuentas SET intentos = 0 WHERE rfc = '$rfc';";
                $result = Ejecutar($con, $sql4);

                // Si es usuario, redirigir a menuUsuario.php
                if ($fila[2] == "U") {
                    $_SESSION['usuario'] = $rfc;
                    header("Location: menuUsuario.php");
                    exit;
                }
                // Si es administrador, redirigir a menuAdmin.php
                else {
                    $_SESSION['usuario'] = $rfc;
                    header("Location: menuAdmin.php");
                    exit;
                }
            }
        }
    } else {
        print("\nContraseña incorrecta\n");
        $sql2 = "UPDATE cuentas SET intentos = intentos+1 WHERE rfc = '$rfc';";
        $result = Ejecutar($con, $sql2);
        if ($fila[5] == 3) {
            $sql3 = "UPDATE cuentas SET bloqueo = 1 WHERE rfc = '$rfc';";
            $result = Ejecutar($con, $sql3);
        }
    }
}

Desconectar($con);
?>
