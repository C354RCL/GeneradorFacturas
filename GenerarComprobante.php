<?php
    include("Controlador.php");
    $con = Conectar();
    //$sql = "SELECT * FROM TarjetaCirculacionCompleta;";
    //$result = Ejecutar($con, $sql);
    //$fila = mysqli_fetch_row($result);
    // print_r($fila);

    //FPDF
    require('fpdf.php');

    $pdf = new FPDF('P','mm', array(60, 90));
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(true);


    //Inicio PDF

    $pdf-> image('./img/sabritas.jpg', 0, 0, 10, 10);
    
    $pdf->SetFont('Arial','',2.5);
    $pdf->SETXY(11, 1);
    $pdf->CELL(15, 1, 'NOMBRE EMISOR', 0,);

    $pdf->SetFont('Arial','',2);
    $pdf->SETXY(11, 2);
    $pdf->CELL(3, 1, 'RFC: ', 0,);
    $pdf->SETXY(14, 2);
    $pdf->CELL(12, 1, 'RFC EMISOR', 0,);

    $pdf->SETXY(11, 3);
    $pdf->CELL(15, 1, 'DOMICILIO', 0,);

    $pdf->SETXY(11, 4);
    $pdf->CELL(15, 1, 'DIRECCION', 0,);

    $pdf->SETXY(11, 5);
    $pdf->CELL(15, 1, 'LOCALIDAD', 0,);

    $pdf->SetFont('Arial','',1.5);

    $pdf->SETXY(11, 6);
    $pdf->CELL(15, 1, 'CONTACTO', 0,);

    $pdf->SETXY(11, 7);
    $pdf->CELL(15, 1, 'CORREO', 0,);

    $pdf->SETXY(11, 9);
    $pdf->CELL(15, 1, 'REG FISCAL', 0,);

    $pdf->Output();


    Desconectar($con);
?>