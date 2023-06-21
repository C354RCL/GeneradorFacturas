<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Receptores</title>
</head>
<body>
    <h1>Consulta de receptores</h1>
    <div class="container">
        <?php
            include('../Controlador.php');
            $con = Conectar();
            $sql = 'SELECT * FROM receptores;';
            $res = Ejecutar($con, $sql);
            $cantidadFilas = mysqli_num_rows($res);
            print('<table class="tabla">');
            print('<tr class="encabezados">');
                print('<th>RFC</th>');
                print('<th>Nombre</th>');
                print('<th>Dom. Fisc. Receptor</th>');
                print('<th>Uso CFDI</th>');
                print('<th>Resi. Fiscal</th>');
                print('<th>No. Reg. ID Trin</th>');
            print('</tr>');
            for($i = 0; $i<$cantidadFilas; $i++){
                $reg = mysqli_fetch_row($res);
                print('<tr>');
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