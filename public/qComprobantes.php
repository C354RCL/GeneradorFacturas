<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="consulta.css">
    <title>Comprobantes</title>
</head>
<body>
    <h1>Consulta de comprobantes</h1>
    <div class="container">
        <?php
            $rfc = $_POST['rfc'];
            include('../Controlador.php');
            $con = Conectar();
            $sql = "SELECT id, folio, fecha, total, rfcEmisor, rfcReceptor FROM comprobantes WHERE rfcEmisor = '$rfc';";
            $res = Ejecutar($con, $sql);
            $cantidadFilas = mysqli_num_rows($res);
            print('<table class="tabla">');
            print('<tr class="encabezados">');
                print("<th>ID</th>");
                print("<th>Folio</th>");
                print("<th>Fecha</th>");
                print("<th>Total</th>");
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
                print('</tr>');
            }
            print('</table>');
            print('Cantidad de filas: '.$cantidadFilas);
        ?>
    </div>
</body>
</html>