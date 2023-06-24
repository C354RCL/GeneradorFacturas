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

    
    for( $i = 0; $i <= 10; $i++)
    {
        $pdf->SETX(5);
        //Datos
        $pdf->setFont('Arial','' , 6);
        //#
        //$pdf->SETXY(5, 50);
        $pdf->CELL(20, 5, '#', 1, '0', 'C');
        //Cve
        //$pdf->SETXY(25, 50);
        $pdf->CELL(20, 5, 'Clave', 1, '0', 'C');
        //Articulo
        //$pdf->SETXY(45, 50);
        $pdf->CELL(20, 5, 'Articulo', 1, '0', 'C');
        //Cantidad
        //$pdf->SETXY(65, 50);
        $pdf->CELL(20, 5, 'Cantidad', 1, '0', 'C');
        //Clave u
        //$pdf->SETXY(85, 50);
        $pdf->CELL(20, 5, 'Clave unidad', 1, '0', 'C');
        //Descripcion
        //$pdf->SETXY(105, 50);
        $pdf->CELL(40, 5, 'Descripcion', 1, '0', 'C');
        //Valor u
        //$pdf->SETXY(145, 50);
        $pdf->CELL(20, 5, 'Valor unitario', 1, '0', 'C');
        //Importe
        //$pdf->SETXY(165, 50);
        $pdf->CELL(20, 5, 'Importe', 1, '0', 'C');
        //Descuento
        //$pdf->SETXY(185, 50);
        $pdf->CELL(20, 5, 'Descuento', 1, '1', 'C');

    }

    //pie de pagina
    $pdf-> image('./img/QR.png', 100, 200, 30, 30);

    $pdf->Output();


    Desconectar($con);
?>