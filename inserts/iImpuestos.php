<?php
    $id = $_POST['id'];
    print("ID   : ".$id.'<br>');

    $base = $_POST['base'];
    print("Base: ".$base.'<br>');

    $impuesto = $_POST['impuesto'];
    print("Impuesto: ".$impuesto.'<br>');

    $tipoImpuesto = $_POST['tipoImpuesto'];
    print("Tipo Impuesto: ".$tipoImpuesto.'<br>');

    $tipoFactor = $_POST['tipoFactor'];
    print(": ".$tipoFactor.'<br>');

    $tipoTraslado = $_POST['tipoTraslado'];
    print("Tipo Traslado: ".$tipoTraslado.'<br>');

    $tasaCuota = $_POST['tasaCuota'];
    print("Tasa o Cuota: ".$tasaCuota.'<br>');

    $importe = $_POST['importe'];
    print("Importe: ".$importe.'<br>');

    $sql = 'INSERT INTO impuestos VALUES ('$id', '$base', '$impuesto', '$tipoImpuesto', '$tipoFactor', '$tipoTraslado', '$tasaCuota', '$importe');';
?>