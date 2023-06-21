<?php
    $rfc = $_POST['rfc'];
    print("RFC: ".$rfc.'<br>');

    $nombre = $_POST['nombre'];
    print("Nombre: ".$nombre.'<br>');

    $regFiscal = $_POST['regFiscal'];
    print("Regimen Fiscal: ".$regFiscal.'<br>');

    $facAtrAdquiriente = $_POST['facAtrAdquiriente'];
    print("Fac. Atr. Adquiriente: ".$facAtrAdquiriente.'<br>');

    $sql = "INSERT INTO emisores VALUES('$rfc', '$nombre', '$regFiscal', '$facAtrAdquiriente');";

    include('../Controlador.php');
    $con = Conectar();
    $res = Ejecutar($con, $sql);
    $filasAfectadas = mysqli_affected_rows($con);
    if($filasAfectadas == 1){
        print("<br>"."1 Registro insertado correctamente"."<br>");
    } else {
        print("<br>"."No se pudo insertar el registro");
    }
    Desconectar($conexion);
?>
