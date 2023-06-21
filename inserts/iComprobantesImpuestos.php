<?php
    $id = $_POST['id'];
    print("ID: ".$id.'<br>');

    $idComprobante = $_POST['idComprobante'];
    print("ID Comprobante: ".$idComprobante.'<br>');

    $idImpuesto = $_POST['idImpuesto'];
    print("ID Impuesto: ".$idImpuesto.'<br>');

    $sql = 'INSERT INTO comprobantesImpuestos VALUES('$id', '$idComprobante', '$idImpuesto');';

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