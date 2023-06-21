<?php
    $id = $_POST['id'];
    print("ID: ".$id.'<br>');

    $version = $_POST['version'];
    print("Version: ".$version.'<br>');

    $folio = $_POST['folio'];
    print("Folio: ".$folio.'<br>');

    $fecha = $_POST['fecha'];
    print("Fecha: ".$fecha.'<br>');

    $sello = $_POST['sello'];
    print("Sello: ".$sello.'<br>');

    $formPago = $_POST['formPago'];
    print("Forma Pago: ".$formPago.'<br>');

    $noCertificado = $_POST['noCertificado'];
    print("No. Certificado: ".$noCertificado.'<br>');

    $certificado = $_POST['certificado'];
    print("Certificado: ".$certificado.'<br>');

    $condPago = $_POST['condPago'];
    print("Condiciones Pago: ".$condPago.'<br>');

    $subtotal = $_POST['subtotal'];
    print("Subtotal: ".$subtotal.'<br>');

    $descuento = $_POST['descuento'];
    print("Descuento: ".$descuento.'<br>');

    $moneda = $_POST['moneda'];
    print("Moneda: ".$moneda.'<br>');

    $tipoCambio = $_POST['tipoCambio'];
    print("Tipo Cambio: ".$tipoCambio.'<br>');

    $total = $_POST['total'];
    print("Total: ".$total.'<br>');

    $tipoComprobante = $_POST['tipoComprobante'];
    print("Tipo Comprobante: ".$tipoComprobante.'<br>');

    $exportacion = $_POST['exportacion'];
    print("Exportacion: ".$exportacion.'<br>');

    $metPago = $_POST['metPago'];
    print("Metodo Pago: ".$metPago.'<br>');

    $lugarExpe = $_POST['lugarExpe'];
    print("Lugar Expedicion: ".$lugarExpe.'<br>');

    $confirmacion = $_POST['confirmacion'];
    print("Confirmacion: ".$confirmacion.'<br>');

    $rfcEmisor = $_POST['rfcEmisor'];
    print("RFC Emisor: ".$rfcEmisor.'<br>');

    $rfcReceptor = $_POST['rfcReceptor'];
    print("RFC Receptor: ".$rfcReceptor.'<br>');

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

    // $id = $_POST['id'];
    // print(": ".$id.'<br>');
?>