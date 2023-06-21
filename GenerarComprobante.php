<?php
    include("Controlador.php");
    $con = Conectar();
    //$sql = "SELECT * FROM TarjetaCirculacionCompleta;";
    //$result = Ejecutar($con, $sql);
    //$fila = mysqli_fetch_row($result);
    // print_r($fila);

    //FPDF
    require('fpdf.php');

    $pdf = new FPDF('P','mm');
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(true);


    //Inicio PDF

    $pdf-> image('./img/sabritas.jpg', 0, 0, 40, 40);
    
    $pdf->SetFont('Arial','',12);
    $pdf->SETXY(40, 0);
    $pdf->CELL(80, 5, 'NOMBRE EMISOR', 1,);

    $pdf->SetFont('Arial','',11);
    $pdf->SETXY(40, 5);
    $pdf->CELL(12, 5, 'RFC: ', 1);
    $pdf->SETXY(52, 5);
    $pdf->CELL(68, 5, 'RFC EMISOR', 1);

    $pdf->SETXY(40, 10);
    $pdf->CELL(80, 5, 'DOMICILIO', 1);

    $pdf->SETXY(40, 15);
    $pdf->CELL(80, 5, 'DIRECCION', 1);

    $pdf->SETXY(40, 20);
    $pdf->CELL(80, 5, 'LOCALIDAD', 1);

    $pdf->SetFont('Arial','',10);

    $pdf->SETXY(40, 25);
    $pdf->CELL(80, 5, 'CONTACTO', 1);

    $pdf->SETXY(40, 30);
    $pdf->CELL(80, 5, 'CORREO', 1);

    $pdf->SETXY(40, 35);
    $pdf->CELL(80, 5, 'REG FISCAL', 1);

    $pdf->Output();


    Desconectar($con);
?>