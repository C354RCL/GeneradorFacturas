<?php
    include("Controlador.php");
    $con = Conectar();
    $sql = "SELECT * FROM ComprobantesCompleta;";
    $result = Ejecutar($con, $sql);
    $fila = mysqli_fetch_row($result);
    //print_r($fila);

    //FPDF
    require('fpdf.php');

    $pdf = new FPDF('P','mm');
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(true);


    //Inicio PDF

    $pdf-> image('./img/sabritas.jpg', 5, 5, 30, 30);
    
    $pdf->setFont('Arial','' , 7);


    //Contenedor 1
    $pdf->SETXY(40, 5);
    $pdf->CELL(75, 40, '', 1,);

    //RFC emisor
    $pdf->SETXY(40, 5);
    $pdf->CELL(25, 5, 'RFC emisor:');
    $pdf->SETXY(65, 5);
    $pdf->CELL(50, 5, $fila[20]);
    //Nombre
    $pdf->SETXY(40, 10);
    $pdf->CELL(25, 5, 'Nombre emisor:');
    $pdf->SETXY(65, 10);
    $pdf->CELL(50, 5, $fila[20]);
    //Regimen
    $pdf->SETXY(40, 15);
    $pdf->CELL(25, 5, 'Regimen fiscal:');
    $pdf->SETXY(65, 15);
    $pdf->CELL(50, 5, $fila[20]);

    //Receptor
    //RFC
    $pdf->SETXY(40, 25);
    $pdf->CELL(25, 5, 'RFC receptor');
    $pdf->SETXY(65, 25);
    $pdf->CELL(50, 5, $fila[20]);
    //Nombre
    $pdf->SETXY(40, 30);
    $pdf->CELL(25, 5, 'Nombre receptor');
    $pdf->SETXY(65, 30);
    $pdf->CELL(50, 5, $fila[20]);
    //Domicilio receptor
    $pdf->SETXY(40, 35);
    $pdf->CELL(25, 5, 'Domicilio receptor');
    $pdf->SETXY(65, 35);
    $pdf->CELL(50, 5, $fila[20]);
    //Régimen fiscal
    $pdf->SETXY(40, 40);
    $pdf->CELL(25, 5, 'Regimen Fiscal');
    $pdf->SETXY(65, 40);
    $pdf->CELL(50, 5, $fila[20]);




    //Contenedor 2
    $pdf->SETXY(125, 5);
    $pdf->CELL(75, 40, '', 1,);
    
    //Folio fiscal
    $pdf->SETXY(125, 5);
    $pdf->CELL(15, 5, 'Folio fiscal:');
    $pdf->SETXY(140, 5);
    $pdf->CELL(60, 5, $fila[20]);
    //No. serie del CSD:
    $pdf->SETXY(125, 10);
    $pdf->CELL(30, 5, 'No. de serie del CSD:');
    $pdf->SETXY(155, 10);
    $pdf->CELL(45, 5, $fila[20]);
    //Fecha
    $pdf->SETXY(125, 15);
    $pdf->CELL(30, 5, 'Fecha y hora de emision:');
    $pdf->SETXY(155, 15);
    $pdf->CELL(45, 5, $fila[20]);
    //Expedido
    $pdf->SETXY(125, 20);
    $pdf->CELL(30, 5, 'Expedido en:');
    $pdf->SETXY(155, 20);
    $pdf->CELL(45, 5, $fila[20]);
    //Efecto comprobante
    $pdf->SETXY(125, 25);
    $pdf->CELL(30, 5, 'Efecto de comprobante:');
    $pdf->SETXY(155, 25);
    $pdf->CELL(45, 5, $fila[20]);
    //Serie
    $pdf->SETXY(125, 30);
    $pdf->CELL(10, 5, 'Serie:', );
    $pdf->SETXY(135, 30);
    $pdf->CELL(10, 5, 'A', );
    //Folio
    $pdf->SETXY(155, 30);
    $pdf->CELL(10, 5, 'Folio:', );
    $pdf->SETXY(165, 30);
    $pdf->CELL(15, 5, '52', );
    //Uso CFDI
    $pdf->SETXY(125, 35);
    $pdf->CELL(15, 5, 'Uso CFDI:');
    $pdf->SETXY(140, 35);
    $pdf->CELL(60, 5, $fila[20]);
    

    //Campos productos
    $pdf->setFont('Arial','B' , 7);

    //#
    $pdf->SETXY(5, 50);
    $pdf->CELL(20, 5, '#', 1, '', 'C');
    //Cve
    $pdf->SETXY(25, 50);
    $pdf->CELL(20, 5, 'Clave', 1, '', 'C');
    //Articulo
    $pdf->SETXY(45, 50);
    $pdf->CELL(20, 5, 'Articulo', 1, '', 'C');
    //Cantidad
    $pdf->SETXY(65, 50);
    $pdf->CELL(20, 5, 'Cantidad', 1, '', 'C');
    //Clave u
    $pdf->SETXY(85, 50);
    $pdf->CELL(20, 5, 'Clave unidad', 1, '', 'C');
    //Descripcion
    $pdf->SETXY(105, 50);
    $pdf->CELL(40, 5, 'Descripcion', 1, '', 'C');
    //Valor u
    $pdf->SETXY(145, 50);
    $pdf->CELL(20, 5, 'Valor unitario', 1, '', 'C');
    //Importe
    $pdf->SETXY(165, 50);
    $pdf->CELL(20, 5, 'Importe', 1, '', 'C');
    //Descuento
    $pdf->SETXY(185, 50);
    $pdf->CELL(20, 5, 'Descuento', 1, '1', 'C');

    
    for( $i = 0; $i <= 5; $i++)
    {
        $pdf->SETX(5);
        //Datos
        $pdf->setFont('Arial','' , 6);
        //#
        //$pdf->SETXY(5, 50);
        $pdf->CELL(20, 5, '#', 'LTB', '0', 'C');
        //Cve
        //$pdf->SETXY(25, 50);
        $pdf->CELL(20, 5, 'Clave', 'TB', '0', 'C');
        //Articulo
        //$pdf->SETXY(45, 50);
        $pdf->CELL(20, 5, 'Articulo', 'TB', '0', 'C');
        //Cantidad
        //$pdf->SETXY(65, 50);
        $pdf->CELL(20, 5, 'Cantidad', 'TB', '0', 'C');
        //Clave u
        //$pdf->SETXY(85, 50);
        $pdf->CELL(20, 5, 'Clave unidad', 'TB', '0', 'C');
        //Descripcion
        //$pdf->SETXY(105, 50);
        $pdf->CELL(40, 5, 'Descripcion', 'TB', '0', 'C');
        //Valor u
        //$pdf->SETXY(145, 50);
        $pdf->CELL(20, 5, 'Valor unitario', 'TB', '0', 'C');
        //Importe
        //$pdf->SETXY(165, 50);
        $pdf->CELL(20, 5, 'Importe', 'TB', '0', 'C');
        //Descuento
        //$pdf->SETXY(185, 50);
        $pdf->CELL(20, 5, 'Descuento', 'RTB', '1', 'C');

    }

    //pie de pagina
    $pdf-> image('./img/QR.jpg', 10, 180, 35, 35);
    
    //Informacion de pago
    $pdf->setFont('Arial','' , 7);
    $pdf->setFillColor(252, 249, 228);
    //Moneda
    $pdf->SETXY(50, 185);
    $pdf->CELL(20, 3, 'Moneda:','' , '', '', true);
    $pdf->SETXY(70, 185);
    $pdf->CELL(50, 3, 'Moneda:','' , '', '', true);
    //Forma de pago
    $pdf->SETXY(50, 190);
    $pdf->CELL(20, 3, 'Forma de pago:','' , '', '', true);
    $pdf->SETXY(70, 190);
    $pdf->CELL(50, 3, 'pago:','' , '', '', true);
    //Metodo pago
    $pdf->SETXY(50, 195);
    $pdf->CELL(20, 3, 'Metodo de pago:', '', '', '', true);
    $pdf->SETXY(70, 195);
    $pdf->CELL(50, 3, 'pago:','' , '', '', true);

    //Montos
    //Subtotal
    $pdf->SETXY(125, 185);
    $pdf->CELL(20, 3, 'SUBTOTAL:','' , '', '', true);
    $pdf->SETXY(150, 185);
    $pdf->CELL(50, 3, 'sub','' , '', 'R');
    //Descuento
    $pdf->SETXY(125, 190);
    $pdf->CELL(20, 3, 'DESCUENTO:','' , '', '', true);
    $pdf->SETXY(150, 190);
    $pdf->CELL(50, 3, 'sub','' , '', 'R');
    //IVA
    $pdf->SETXY(125, 195);
    $pdf->CELL(20, 3, 'TOTAL I.V.A.:','' , '', '', true);
    $pdf->SETXY(150, 195);
    $pdf->CELL(50, 3, 'sub','' , '', 'R');
    //IEPS
    $pdf->SETXY(125, 200);
    $pdf->CELL(20, 3, 'TOTAL I.E.P.S.:','' , '', '', true);
    $pdf->SETXY(150, 200);
    $pdf->CELL(50, 3, 'sub','' , '', 'R');
    //Total
    $pdf->SETXY(125, 205);
    $pdf->CELL(20, 3, 'TOTAL:','' , '', '', true);
    $pdf->SETXY(150, 205);
    $pdf->CELL(50, 3, 'sub','' , '', 'R');


    //SELLOS
    //Sello digital CFDI
    $pdf->setFont('Arial','' , 7);
    $pdf->SETXY(10, 220);
    $pdf->CELL(30, 3, 'Sello digital del CFDI:','' , '', '', true);
    $pdf->SETXY(10, 223);
    $pdf->setFont('Arial','' , 6);
    $pdf->MultiCell(190, 3, 'H3VoloGbgAGwE1Q5l9fQ+b/mCmgkZ9tpauPvZddDrJ++YVTjAa9WbjPCvpJOS7TF8IP6hBqcX6T9LnbqdSP+bgcIwyUhB4QmHBk/2LjLMRBUfdvSfZ+91EC0oJbbSf/3HHtURFOR536/CvIfBw8ThHxxFiXf3Hsyi/IsIgLjwETRGCKUJ6VLtS5LCAn38/gu9U7XPCGZI+mYYSaIrHdkIXzxOE43+ZHtSTKgH7cp7Z79rczuHg264bwgGKt8R/T6foGxl4S5O5K5tDRh40iBaU8VanHhqIqfesxO5TGP0nGAMjIfJCbFvCPTyVPifHAzpm8DEjANwH0nL0fP3/hyHg==');
    //Sello digital del SAT
    //Sello digital CFDI
    $pdf->setFont('Arial','' , 7);
    $pdf->SETXY(10, 235);
    $pdf->CELL(30, 3, 'Sello digital del SAT:','' , '', '', true);
    $pdf->SETXY(10, 238);
    $pdf->setFont('Arial','' , 6);
    $pdf->MultiCell(190, 3, 'H3VoloGbgAGwE1Q5l9fQ+b/mCmgkZ9tpauPvZddDrJ++YVTjAa9WbjPCvpJOS7TF8IP6hBqcX6T9LnbqdSP+bgcIwyUhB4QmHBk/2LjLMRBUfdvSfZ+91EC0oJbbSf/3HHtURFOR536/CvIfBw8ThHxxFiXf3Hsyi/IsIgLjwETRGCKUJ6VLtS5LCAn38/gu9U7XPCGZI+mYYSaIrHdkIXzxOE43+ZHtSTKgH7cp7Z79rczuHg264bwgGKt8R/T6foGxl4S5O5K5tDRh40iBaU8VanHhqIqfesxO5TGP0nGAMjIfJCbFvCPTyVPifHAzpm8DEjANwH0nL0fP3/hyHg==');
    //Cadena original del complemento de certificacion digital
    //Sello digital CFDI
    $pdf->setFont('Arial','' , 7);
    $pdf->SETXY(10, 250);
    $pdf->CELL(75, 3, 'Cadena original del complemento de certificacion digital del SAT:','' , '', '', true);
    $pdf->SETXY(10, 253);
    $pdf->setFont('Arial','' , 6);
    $pdf->MultiCell(190, 3, 'H3VoloGbgAGwE1Q5l9fQ+b/mCmgkZ9tpauPvZddDrJ++YVTjAa9WbjPCvpJOS7TF8IP6hBqcX6T9LnbqdSP+bgcIwyUhB4QmHBk/2LjLMRBUfdvSfZ+91EC0oJbbSf/3HHtURFOR536/CvIfBw8ThHxxFiXf3Hsyi/IsIgLjwETRGCKUJ6VLtS5LCAn38/gu9U7XPCGZI+mYYSaIrHdkIXzxOE43+ZHtSTKgH7cp7Z79rczuHg264bwgGKt8R/T6foGxl4S5O5K5tDRh40iBaU8VanHhqIqfesxO5TGP0nGAMjIfJCbFvCPTyVPifHAzpm8DEjANwH0nL0fP3/hyHg==');
    //Folio fiscal
    $pdf->SETXY(10, 265);
    $pdf->CELL(15, 3, 'Folio fiscal:','' , '', '');
    $pdf->SETXY(25, 265);
    $pdf->CELL(60, 3, 'B46705A4-3DA5-4C0F-A0AD-755736C70C99:','' , '', '');
    //Fecha certificacion
    $pdf->SETXY(10, 270);
    $pdf->CELL(30, 3, 'Fecha y hora de certificacion:','' , '', '');
    $pdf->SETXY(40, 270);
    $pdf->CELL(45, 3, 'B46705A4-3DA5-4C0F-A0AD-755736C70C99:','' , '', '');
    //Numero serie certificado SAT
    $pdf->SETXY(90, 265);
    $pdf->CELL(40, 3, 'No. de serie del certificado SAT:','' , '', '');
    $pdf->SETXY(130, 265);
    $pdf->CELL(60, 3, 'B46705A4-3DA5-4C0F-A0AD-755736C70C99:','' , '', '');
    //RFC del provedoor de certificacion
    $pdf->SETXY(90, 270);
    $pdf->CELL(40, 3, 'RFC del provedoor de certificacion:','' , '', '');
    $pdf->SETXY(130, 270);
    $pdf->CELL(60, 3, 'B46705A4-3DA5-4C0F-A0AD-755736C70C99:','' , '', '');

    //Leyenda
    $pdf->setFont('Arial','B' , 7);
    $pdf->SETXY(70, 275);
    $pdf->CELL(65, 3, 'Este documento es una representacion impresa de un CFDI','' , '', 'C');

    $pdf->Output();


    Desconectar($con);
?>