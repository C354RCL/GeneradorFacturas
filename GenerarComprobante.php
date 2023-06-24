<?php
    include("Controlador.php");
    $con = Conectar();

    $folio = $_POST['folio'];

    //Vista Comprobantes Completa
    $sql = "SELECT * FROM ComprobantesCompleta WHERE folio = $folio;";
    $result = Ejecutar($con, $sql);
    //Obtenemos el array con el resultado del query
    $fila = mysqli_fetch_row($result);

    //Asignamos el ID del comprobante
    $ID = $fila[0];

    //Conceptos del comprobante
    //sql que manda a llamar la vista comprobantesconceptoscompleta cuando el idcomprobantes sea igual a '$ID'
    $sql = "SELECT * FROM `comprobantesconceptoscompleta` WHERE idComprobantes = $ID;";
    $result = Ejecutar($con, $sql);
    
    // Arreglo para almacenar las filas
    $filas = array(); 

    while ($filaC = mysqli_fetch_row($result)) {
        // Agregar la fila al arreglo
        $filas[] = $filaC; 
    }

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
    $pdf->CELL(50, 5, $fila[22]);
    //Regimen
    $pdf->SETXY(40, 15);
    $pdf->CELL(25, 5, 'Regimen fiscal:');
    $pdf->SETXY(65, 15);
    $pdf->CELL(50, 5, $fila[23]);

    //Receptor
    //RFC
    $pdf->SETXY(40, 25);
    $pdf->CELL(25, 5, 'RFC receptor');
    $pdf->SETXY(65, 25);
    $pdf->CELL(50, 5, $fila[21]);
    //Nombre
    $pdf->SETXY(40, 30);
    $pdf->CELL(25, 5, 'Nombre receptor');
    $pdf->SETXY(65, 30);
    $pdf->CELL(50, 5, $fila[25]);
    //Domicilio receptor
    $pdf->SETXY(40, 35);
    $pdf->CELL(25, 5, 'Domicilio receptor');
    $pdf->SETXY(65, 35);
    $pdf->CELL(50, 5, $fila[26]);
    //Régimen fiscal
    $pdf->SETXY(40, 40);
    $pdf->CELL(25, 5, 'Regimen Fiscal');
    $pdf->SETXY(65, 40);
    $pdf->CELL(50, 5, $fila[27]);




    //Contenedor 2
    $pdf->SETXY(125, 5);
    $pdf->CELL(75, 40, '', 1,);
    
    //Folio fiscal
    $pdf->SETXY(125, 5);
    $pdf->CELL(15, 5, 'Folio fiscal:');
    $pdf->SETXY(140, 5);
    $pdf->CELL(60, 5, $fila[3]);
    //No. serie del CSD:
    $pdf->SETXY(125, 10);
    $pdf->CELL(30, 5, 'No. de serie del CSD:');
    $pdf->SETXY(155, 10);
    $pdf->CELL(45, 5, $fila[2]);
    //Fecha
    $pdf->SETXY(125, 15);
    $pdf->CELL(30, 5, 'Fecha y hora de emision:');
    $pdf->SETXY(155, 15);
    $pdf->CELL(45, 5, $fila[4]);
    //Expedido
    $pdf->SETXY(125, 20);
    $pdf->CELL(30, 5, 'Expedido en:');
    $pdf->SETXY(155, 20);
    $pdf->CELL(45, 5, $fila[18]);
    //Efecto comprobante
    $pdf->SETXY(125, 25);
    $pdf->CELL(30, 5, 'Efecto de comprobante:');
    $pdf->SETXY(155, 25);
    $pdf->CELL(45, 5, 'I Ingreso');
    //Serie
    $pdf->SETXY(125, 30);
    $pdf->CELL(10, 5, 'Serie:', );
    $pdf->SETXY(135, 30);
    $pdf->CELL(10, 5, 'A', );
    //Folio
    $pdf->SETXY(155, 30);
    $pdf->CELL(10, 5, 'Folio:', );
    $pdf->SETXY(165, 30);
    $pdf->CELL(15, 5, $fila[3]);
    //Uso CFDI
    $pdf->SETXY(125, 35);
    $pdf->CELL(15, 5, 'Uso CFDI:');
    $pdf->SETXY(140, 35);
    $pdf->CELL(60, 5, $fila[28]);
    

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

    $n = 1;
    $subtotal = 0;
    foreach ($filas as $filaC)
    {

        $pdf->SETX(5);
        //Datos
        $pdf->setFont('Arial','' , 6);
        //#
        //$pdf->SETXY(5, 50);
        $pdf->CELL(20, 5, $n , 'LTB', '0', 'C');
        //Cve
        //$pdf->SETXY(25, 50);
        $pdf->CELL(20, 5, $filaC[3], 'TB', '0', 'C');
        //Articulo
        //$pdf->SETXY(45, 50);
        $pdf->CELL(20, 5, $filaC[3], 'TB', '0', 'C');
        //Cantidad
        //$pdf->SETXY(65, 50);
        $pdf->CELL(20, 5, $filaC[4], 'TB', '0', 'C');
        //Clave u
        //$pdf->SETXY(85, 50);
        $pdf->CELL(20, 5, $filaC[5], 'TB', '0', 'C');
        //Descripcion
        //$pdf->SETXY(105, 50);
        $pdf->CELL(40, 5, $filaC[6], 'TB', '0', 'C');
        //Valor u
        //$pdf->SETXY(145, 50);
        $pdf->CELL(20, 5, '$'.$filaC[7], 'TB', '0', 'C');
        //Importe
        //$pdf->SETXY(165, 50);
        $pdf->CELL(20, 5, '$'.$filaC[8], 'TB', '0', 'C');
        //Descuento
        //$pdf->SETXY(185, 50);
        $pdf->CELL(20, 5, ' ', 'RTB', '1', 'C');
        $n = $n + 1;
        $subtotal = $subtotal + $filaC[8];
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
    $pdf->CELL(50, 3, 'MXN Peso Mexicano','' , '', '', true);
    //Forma de pago
    $pdf->SETXY(50, 190);
    $pdf->CELL(20, 3, 'Forma de pago:','' , '', '', true);
    $pdf->SETXY(70, 190);
    $pdf->CELL(50, 3, $fila[6],'' , '', '', true);
    //Metodo pago
    $pdf->SETXY(50, 195);
    $pdf->CELL(20, 3, 'Metodo de pago:', '', '', '', true);
    $pdf->SETXY(70, 195);
    $pdf->CELL(50, 3, $fila[17],'' , '', '', true);

    //Montos
    //Subtotal
    $pdf->SETXY(125, 185);
    $pdf->CELL(20, 3, 'SUBTOTAL:','' , '', '', true);
    $pdf->SETXY(150, 185);
    $pdf->CELL(50, 3, '$'.number_format($subtotal, 2, ',', '.'),'' , '', 'R');
    //Descuento
    $pdf->SETXY(125, 190);
    $pdf->CELL(20, 3, 'DESCUENTO:','' , '', '', true);
    $pdf->SETXY(150, 190);
    $pdf->CELL(50, 3, ' ','' , '', 'R');
    $iva = $subtotal * 0.16;
    //IVA
    $pdf->SETXY(125, 195);
    $pdf->CELL(20, 3, 'TOTAL I.V.A.:','' , '', '', true);
    $pdf->SETXY(150, 195);
    $pdf->CELL(50, 3, '$'.number_format($iva, 2, ',', '.'),'' , '', 'R');
    //IEPS
    $pdf->SETXY(125, 200);
    $pdf->CELL(20, 3, 'TOTAL I.E.P.S.:','' , '', '', true);
    $pdf->SETXY(150, 200);
    $pdf->CELL(50, 3, '$0.00 ','' , '', 'R');
    //Total
    $pdf->SETXY(125, 205);
    $pdf->CELL(20, 3, 'TOTAL:','' , '', '', true);
    $pdf->SETXY(150, 205);
    $pdf->CELL(50, 3, '$'.number_format($subtotal + $iva, 2, ',', '.'),'' , '', 'R');


    //SELLOS
    //Sello digital CFDI
    $pdf->setFont('Arial','' , 7);
    $pdf->SETXY(10, 220);
    $pdf->CELL(30, 3, 'Sello digital del CFDI:','' , '', '', true);
    $pdf->SETXY(10, 223);
    $pdf->setFont('Arial','' , 6);
    $pdf->MultiCell(190, 3, $fila[5]);
    //Sello digital del SAT
    $pdf->setFont('Arial','' , 7);
    $pdf->SETXY(10, 235);
    $pdf->CELL(30, 3, 'Sello digital del SAT:','' , '', '', true);
    $pdf->SETXY(10, 238);
    $pdf->setFont('Arial','' , 6);
    $pdf->MultiCell(190, 3, $fila[5]);
    //Cadena original del complemento de certificacion digital
    //Sello digital CFDI
    $pdf->setFont('Arial','' , 7);
    $pdf->SETXY(10, 250);
    $pdf->CELL(75, 3, 'Cadena original del complemento de certificacion digital del SAT:','' , '', '', true);
    $pdf->SETXY(10, 253);
    $pdf->setFont('Arial','' , 6);
    $pdf->MultiCell(190, 3, $fila[5]);
    //Folio fiscal
    $pdf->SETXY(10, 265);
    $pdf->CELL(15, 3, 'Folio fiscal:','' , '', '');
    $pdf->SETXY(25, 265);
    $pdf->CELL(60, 3, 'B46705A4-3DA5-4C0F-A0AD-755736C70C99','' , '', '');
    //Fecha certificacion
    $pdf->SETXY(10, 270);
    $pdf->CELL(30, 3, 'Fecha y hora de certificacion:','' , '', '');
    $pdf->SETXY(40, 270);
    $pdf->CELL(45, 3, $fila[4],'' , '', '');
    //Numero serie certificado SAT
    $pdf->SETXY(90, 265);
    $pdf->CELL(40, 3, 'No. de serie del certificado SAT:','' , '', '');
    $pdf->SETXY(130, 265);
    $pdf->CELL(60, 3, $fila[7],'' , '', '');
    //RFC del provedoor de certificacion
    $pdf->SETXY(90, 270);
    $pdf->CELL(40, 3, 'RFC del provedoor de certificacion:','' , '', '');
    $pdf->SETXY(130, 270);
    $pdf->CELL(60, 3, 'PPD101129EA','' , '', '');

    //Leyenda
    $pdf->setFont('Arial','B' , 7);
    $pdf->SETXY(70, 275);
    $pdf->CELL(65, 3, 'Este documento es una representacion impresa de un CFDI','' , '', 'C');

    print("Comprobante creado correctamente");
    $pdf->Output('F', './Files/'.$folio.'.pdf');


    Desconectar($con);
?>