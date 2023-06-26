<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/consultar.css">
    <title>Comprobantes</title>
</head>
<body>
    <h1>Consulta de comprobantes</h1>
    <div class="container">
        <?php
            include('../Controlador.php');
            $con = Conectar();
            //Obtenemos el valor del formulario
            $rfc = $_POST['rfc'];
            //Hacemos la consulta
            $sql = "SELECT id, folio, fecha, total, rfcEmisor, rfcReceptor FROM comprobantes WHERE rfcEmisor = '$rfc';";
            //Ejecutamos la consulta
            $res = Ejecutar($con, $sql);
            //Obtenemos el numero de filas que arroga la consula 
            $cantidadFilas = mysqli_num_rows($res);
            //Creamos el diseño de la tabla
            print('<table class="tabla">');
            print('<tr class="encabezados">');
                print("<th>ID</th>");
                print("<th>Folio</th>");
                print("<th>Fecha</th>");
                print("<th>Total</th>");
                print("<th>RFC Emisor</th>");
                print("<th>RFC Receptor</th>");
                print("<th>PDF</th>");
                print("<th>XML</th>");
            print("</tr>");
            //Imprimimos cada valor del cada atributo
            for($i = 0; $i < $cantidadFilas; $i++){
                $reg = mysqli_fetch_row($res);
                print('<tr class="fila">');
                    print("<td class='registro'>$reg[0]</td>");
                    print("<td class='registro' id='folio'>$reg[1]</td>");
                    print("<td class='registro'>$reg[2]</td>");
                    print("<td class='registro'>$reg[3]</td>");
                    print("<td class='registro'>$reg[4]</td>");
                    print("<td class='registro'>$reg[5]</td>");
                    print("<td class='registro'>");
                    if (file_exists("../Files/$reg[1].pdf")){
                        print("<button id='pdf'>Observar</button>");
                    } else {
                        print("<button id='pdf' disabled>Observar</button>");
                    }
                    print("</td>");
                    print("<td class='registro'>");
                    if (file_exists("../Files/$reg[1].xml")){
                        print("<button id='xml'>Observar</button>");
                    } else {
                        print("<button id='xml' disabled>Observar</button>");
                    }
                    print("</td>");
                print("</tr>");
            }
            print('</table>');
            print("<br><h4>Cantidad de comprobantes: $cantidadFilas</h4> ");

            $sql = "SELECT folio FROM comprobantes WHERE rfcEmisor = '$rfc'";
            $res = Ejecutar($con, $sql);
            $folio = mysqli_fetch_row($res);
        ?>
    </div>
    <script src="abrirArchivo.js"></script>
</body>
</html>