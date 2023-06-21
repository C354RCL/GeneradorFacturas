<?php
    $rfc = $_POST['rfc'];
    print("RFC: ".$rfc.'<br>');

    $nombre = $_POST['nombre'];
    print("Nombre: ".$nombre.'<br>');

    $domFiscRece = $_POST['domFiscRece'];
    print("Dom. Fisc. Rece: ".$domFiscRece.'<br>');

    $usoCFDI = $_POST['usoCFDI'];
    print("Uso CFDI: ".$usoCFDI.'<br>');

    $resiFiscal = $_POST['resiFiscal'];
    print("Residencia Fiscal: ".$resiFiscal.'<br>');

    $noRegTrin = $_POST['noRegTrin'];
    print("No. Reg. ID Trin: ".$noRegTrin.'<br>');

    $sql = 'INSERT INTO receptores VALUES('$rfc', '$nombre', '$domFiscRece', '$usoCFDI', '$resiFiscal', '$noRegTrin');';

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