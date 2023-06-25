<?php
include("Controlador.php");
$con = Conectar();


$conceptos = '';
$subtotal = 0;
$impuestototal = 0;
$total = 0;

//Vista Comprobantes Completa
$sql = "SELECT * FROM ComprobantesCompleta WHERE folio = 1584789415;";
$result = Ejecutar($con, $sql);
//Obtenemos el array con el resultado del query
$fila = mysqli_fetch_row($result);

//Asignamos el ID del comprobante
$ID = $fila[0];

//Conceptos del comprobante
//sql que manda a llamar la vista comprobantesconceptoscompleta cuando el idcomprobantes sea igual a '$resultID'
$sql = "SELECT * FROM `comprobantesconceptoscompleta` WHERE idComprobantes = $ID;";
$result = Ejecutar($con, $sql);

// Arreglo para almacenar las filas
$filas = array(); 

while ($filaC = mysqli_fetch_row($result)) {
    // Agregar la fila al arreglo
    $filas[] = $filaC; 
}

    foreach ($filas as $filaC)
    {
        $conceptos = $conceptos.
        '<cfdi:Concepto ClaveProdServ="'.$filaC[3].'" NoIdentificacion="'.$filaC[3].'" Cantidad="'.$filaC[4].'" ClaveUnidad="'.$filaC[5].'" Unidad="'.$filaC[5].'" Descripcion="'.$filaC[6].'" ValorUnitario="'.$filaC[7].'" Importe="'.$filaC[8].'">
        <cfdi:Impuestos>
            <cfdi:Traslados>
            <cfdi:Traslado Base="'.$filaC[8].'" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="'.$filaC[8]*1.16.'" />
            </cfdi:Traslados>
        </cfdi:Impuestos>
        </cfdi:Concepto>';
    }

    foreach($filas as $filaC)
    {
    $subtotal = $subtotal + $filaC[8];
    $impuestototal = $impuestototal + $filaC[8]*0.16;
    }   
$xml = '<?xml version="1.0" encoding="utf-8"?>
        <cfdi:Comprobante Version="4.0" Serie="A" Folio="'.$fila[3].'" Fecha="'.$fila[4].'" Sello="'.$fila[5].'" FormaPago="'.$fila[6].'" NoCertificado="'.$fila[7].'" Certificado="'.$fila[8].'" CondicionesDePago="'.$fila[9].'" SubTotal="'.$subtotal.'" Moneda="'.$fila[12].'" Total="'.$total.'" TipoDeComprobante="'.$fila[15].'" Exportacion="'.$fila[16].'" MetodoPago="'.$fila[17].'" LugarExpedicion="'.$fila[18].'" xmlns:cfdi="">
        <cfdi:Emisor Rfc="'.$fila[20].'" Nombre="'.$fila[22].'" RegimenFiscal="'.$fila[23].'" />
        <cfdi:Receptor Rfc="'.$fila[21].'" Nombre="'.$fila[25].'" DomicilioFiscalReceptor="'.$fila[26].'" RegimenFiscalReceptor="'.$fila[27].'" UsoCFDI="'.$fila[28].'" />
        <cfdi:Conceptos>'.
        $conceptos
        .'</cfdi:Conceptos>
        <cfdi:Impuestos TotalImpuestosTrasladados="'.$impuestototal.'">
            <cfdi:Traslados>
            <cfdi:Traslado Base="'.$subtotal.'" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="'.$impuestototal + $subtotal.'" />
            </cfdi:Traslados>
        </cfdi:Impuestos>
        <cfdi:Complemento>
            <tfd:TimbreFiscalDigital FechaTimbrado="'.$fila[4].'" NoCertificadoSAT="'.$fila[7].'" RfcProvCertif="PPD101129EA3" SelloCFD="'.$fila[7].'" SelloSAT="'.$fila[7].'" UUID="B46705A4-3DA5-4C0F-A0AD-755736C70C99" Version="1.1" xsi:schemaLocation="" />
        </cfdi:Complemento>
        </cfdi:Comprobante>

';

$nombre = $fila[3].'.xml';
$archivo = fopen('./Files/'.$nombre, 'a +');
fwrite($archivo, $xml);
fclose($archivo);

?>
