<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Comprobantes</title>
</head>
<body>
    <h1>Consulta de comprobantes</h1>
    <div class="container">
        <?php
            include('../Controlador.php');
            $con = Conectar();
            $sql = 'SELECT * FROM comprobantes;';
            $res = Ejecutar($con, $sql);
            $cantidadFilas = mysqli_num_rows($res);
            print('<table class="tabla">');
            print('<tr class="encabezados">');
                print("<th>ID</th>");
                print("<th>Version</th>");
                print("<th>Serie</th>");
                print("<th>Folio</th>");
                print("<th>Fecha</th>");
                print("<th>Sello</th>");
                print("<th>Forma Pago</th>");
                print("<th>No Certificado</th>");
                print("<th>Certificado</th>");
                print("<th>Condiciones Pago</th>");
                print("<th>Subtotal</th>");
                print("<th>Descuento</th>");
                print("<th>Moneda</th>");
                print("<th>Tipo Cambio</th>");
                print("<th>Total</th>");
                print("<th>Tipo Comprobante</th>");
                print("<th>Exportacion</th>");
                print("<th>Metodo Pago</th>");
                print("<th>Lugar Expedicion</th>");
                print("<th>Confirmacion</th>");
                print("<th>RFC Emisor</th>");
                print("<th>RFC Receptor</th>");
            print("</tr>");
            for($i = 0; $i<$cantidadFilas; $i++){
                $reg = mysqli_fetch_row($res);
                print('<tr class="fila">');
                    print("<td class='registro'>$reg[0]</td>");
                    print("<td class='registro'>$reg[1]</td>");
                    print("<td class='registro'>$reg[2]</td>");
                    print("<td class='registro'>$reg[3]</td>");
                    print("<td class='registro'>$reg[4]</td>");
                    print("<td class='registro'>$reg[5]</td>");
                    print("<td class='registro'>$reg[6]</td>");
                    print("<td class='registro'>$reg[7]</td>");
                    print("<td class='registro'>$reg[8]</td>");
                    print("<td class='registro'>$reg[9]</td>");
                    print("<td class='registro'>$reg[10]</td>");
                    print("<td class='registro'>$reg[11]</td>");
                    print("<td class='registro'>$reg[12]</td>");
                    print("<td class='registro'>$reg[13]</td>");
                    print("<td class='registro'>$reg[14]</td>");
                    print("<td class='registro'>$reg[15]</td>");
                    print("<td class='registro'>$reg[16]</td>");
                    print("<td class='registro'>$reg[17]</td>");
                    print("<td class='registro'>$reg[18]</td>");
                    print("<td class='registro'>$reg[19]</td>");
                    print("<td class='registro'>$reg[20]</td>");
                    print("<td class='registro'>$reg[21]</td>");
                print('</tr>');
            }
            print('</table>');
            print('Cantidad de filas: '.$cantidadFilas);
        ?>
    </div>
</body>
</html>