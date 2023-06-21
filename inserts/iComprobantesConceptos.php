<?php
    $id = $_POST['id'];
    print("ID: ".$id.'<br>');

    $idComprobantes = $_POST['idComprobantes'];
    print("ID Comprobantes: ".$idComprobantes.'<br>');

    $idConceptos = $_POST['idConceptos'];
    print("ID Conceptos: ".$idConceptos.'<br>');

    $sql = 'INSERT INTO comprobantesConceptos VALUES('$id', '$idComprobantes', '$idConceptos');';

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