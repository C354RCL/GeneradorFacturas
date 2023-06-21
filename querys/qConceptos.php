<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Conceptos</title>
</head>
<body>
    <h1>Consulta de conceptos</h1>
    <div class="container">
        <?php
            include('../Controlador.php');
            $con = Conectar();
            $sql = 'SELECT * FROM conceptos;';
            $res = Ejecutar($con, $sql);
            $cantidadFilas = mysqli_num_rows($res);
            print('<table class="tabla">');
                print('<tr class="encabezados">');
                    print('<th>ID</th>');
                    print('<th>Clave Producto Servicio</th>');
                    print('<th>Cantidad</th>');
                    print('<th>Clave Unica</th>');
                    print('<th>Unidad</th>');
                    print('<th>Descripcion</th>');
                    print('<th>Valor Unitario</th>');
                    print('<th>Importe</th>');
                    print('<th>Descuento</th>');
                    print('<th>Objeto Importe</th>');
                print('</tr>');
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
                    print('</tr>');
                }
            print('</table>');
            print('Cantidad de filas: '.$cantidadFilas);
        ?>
    </div>
</body>
</html>