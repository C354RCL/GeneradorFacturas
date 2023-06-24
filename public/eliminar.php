<?php
    $folio = $_POST['folio'];
    print("Comprobante con folio ".$folio." eliminado");

    $sql = "DELETE FROM comprobantes WHERE folio = '$folio';";

    include('../Controlador.php');
    $con = Conectar();
    $result = Ejecutar($con, $sql);
    $filasAfectadas = mysqli_affected_rows($con);
    if($filasAfectadas >= 0){
        print("<br>".$filasAfectadas." Filas eliminadas"."<br>");
    } else {
        print("No se pudo borrar el registro");
    }
    Desconectar($con);
?>