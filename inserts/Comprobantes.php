<?php
// Incluir el archivo para verificar la sesión
include("../verificar_sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobantes</title>
    <link rel="stylesheet" href="./styles/formulario.css">
</head>
<body>
    <div class="container">
        <div class="encabezados">
            <h1>Comprobantes</h1>
            <h2>Inserte los datos correctamente</h2>
        </div>
        <form action="./iComprobantes.php" action="../GenerarComprobante.php" method="post" >
            <div class="form">
                <div class="inputs">
                    <label for="">ID</label> <br>
                    <input type="text" name="id" id="id"> <br>
        
                    <label for="">Version</label> <br>
                    <input type="text" name="version" id="version"> <br>

                    <label for="">Serie</label> <br>
                    <input type="text" name="serie" id="serie"> <br>
        
                    <label for="">Folio</label> <br>
                    <input type="text" name="folio" id="folio"> <br>
        
                    <label for="">Fecha</label> <br>
                    <input type="datetime-local" name="fecha" id="fecha"> <br>
        
                    <label for="">Sello</label> <br>
                    <input type="text" name="sello" id="sello"> <br>
        
                    
                </div>
    
                <div class="inputs">
                    <label for="">Certificado</label> <br>
                    <input type="text" name="certificado" id="certificado"> <br>
        
                    <label for="">Condiciones Pago</label><br>
                    <input type="text" name="condPago" id="condPago"><br>
        
                    <!-- <label for="">Subtotal</label><br>
                    <input type="number" name="subtotal" id="subtotal"><br>
        
                    <label for="">Descuento</label><br>
                    <input type="number" name="descuento" id="descuento"><br> -->
        
                    <label for="">Moneda</label><br>
                    <input type="text" name="moneda" id="moneda"><br>
        
                    <!-- <label for="">Tipo Cambio</label><br>
                    <input type="text" name="tipoCambio" id="tipoCambio"><br> -->
        
                    <!-- <label for="">Total</label><br>
                    <input type="number" name="total" id="total"><br> -->
                    <label for="">Forma Pago</label> <br>
                    <input type="text" name="formPago" id="formPago"> <br>
        
                    <label for="">No. Certificado</label> <br>
                    <input type="text" name="noCertificado" id="noCertificado"> <br>
                    <label for="">Conceptos</label><br>
                    <input type="text" name="Conceptos" id="Conceptos" maxlength="13"><br>
                
                </div>
    
                <div class="inputs">
                    <label for="">Tipo Comprobante</label><br>
                    <input type="text" name="tipoComprobante" id="tipoComprobante"><br>
        
                    <label for="">Exportacion</label><br>
                    <input type="text" name="exportacion" id="exportacion"><br>
        
                    <label for="">Metodo Pago</label><br>
                    <input type="text" name="metPago" id="metPago"><br>
        
                    <label for="">Lugar Expedicion</label><br>
                    <input type="text" name="lugarExpe" id="lugarExpe"><br>
        
                    <!-- <label for="">Confirmacion</label><br>
                    <input type="text" name="confirmacion" id="confirmacion"><br> -->
        
                    <label for="">RFC Emisor</label><br>
                    <input type="text" name="rfcEmisor" id="rfcEmisor" maxlength="13"><br>
        
                    <label for="">RFC Receptor</label><br>
                    <input type="text" name="rfcReceptor" id="rfcReceptor" maxlength="13"><br>

                    
                </div>
            </div>
            <button type="submit" class="btnEnviar">REGISTRAR</button>
        </form>
    </div>
</body>
</html>