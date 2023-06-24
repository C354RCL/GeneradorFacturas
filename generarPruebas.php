<?php
    include("Controlador.php");
    $con = Conectar();

    //sql que manda a llamar a todos los atributos que esten ligados al folio 
    $sql = "SELECT * FROM ComprobantesCompleta WHERE folio = 1584789415;";
    $result = Ejecutar($con, $sql);
    //Obtenemos el array con el resultado del query
    $fila = mysqli_fetch_row($result);
    print("Datos de vista 'comprobantescompleta'<br>");
    print_r($fila);



    //Seleccionamos el id del comprobante 
    $sql = "SELECT id FROM comprobantescompleta WHERE folio = 1584789415;";
    $result = Ejecutar($con, $sql);
    //Obtenemos el array con el resultado del query
    $fila = mysqli_fetch_row($result);
    //Asiganmos a una variable el id resultante de la consulta anterior
    $resultID = $fila[0];
    print("<br><br>ID<br>".$resultID);

    

    //sql que manda a llamar la vista comprobantesconceptoscompleta cuando el idcomprobantes sea igual a '$resultID'
    $sql = "SELECT * FROM `comprobantesconceptoscompleta` WHERE idComprobantes = $resultID;";
    $result = Ejecutar($con, $sql);

    print("<br><br>Datos de vista 'comprobantesconceptoscompleta'<br>");
    
    // Arreglo para almacenar las filas
    $filas = array(); 

    while ($fila = mysqli_fetch_row($result)) {
        // Agregar la fila al arreglo
        $filas[] = $fila; 
    }

    // Imprimir todas las filas
    foreach ($filas as $fila) {
        print_r($fila);
        print("<br>");
    }

    //sql que manda a llamar la vista comprobantesimpuestoscompleta cuando el idcomprobantes sea igual a '$resultID'
    $sql = "SELECT * FROM `comprobantesimpuestoscompleta` WHERE idComprobantes = $resultID;";
    $result = Ejecutar($con, $sql);

    print("<br><br>Datos de vista 'comprobantesimpuestoscompleta'<br>");
    
    // Arreglo para almacenar las filas
    $filas = array(); 

    while ($fila = mysqli_fetch_row($result)) {
        // Agregar la fila al arreglo
        $filas[] = $fila; 
    }

    // Imprimir todas las filas
    foreach ($filas as $fila) {
        print_r($fila);
        print("<br>");
    }

?>