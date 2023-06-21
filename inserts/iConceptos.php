<?php
    $id = $_POST['id'];
    print(": ".$id.'<br>');

    $claveProdServ = $_POST['claveProdServ'];
    print("Clave Prodcuto Servicio: ".$claveProdServ.'<br>');

    $cantidad = $_POST['cantidad'];
    print("Cantidad: ".$cantidad.'<br>');

    $claveUnica = $_POST['claveUnica'];
    print("Clave Unica: ".$claveUnica.'<br>');

    $unidad = $_POST['unidad'];
    print("Unidad: ".$unidad.'<br>');

    $sql = 'INSERT INTO conceptos VALUES ('$id', '$claveProdServ', '$cantidad', '$claveUnica', '$unidad');';

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