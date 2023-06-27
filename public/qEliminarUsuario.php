<?php
    // Incluir el archivo para verificar la sesión
    include("../verificar_sesion.php");
    
    include('../Controlador.php');
    $folio = $_POST['folio'];
    $con = Conectar();
    //Hacemos la consulta
    $sql = "SELECT folio FROM comprobantes WHERE rfcEmisor = '$usuario';" ;
    //Ejecutamos la consulta
    $res = Ejecutar($con, $sql);
    $reg = mysqli_fetch_row($res);

    //Obtener los valores del resultado y almacenarlos en un array
    $folios = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $folios[] = $row['folio'];
    }

    //Comprobamos si el folio pertence a el
    if(in_array($folio, $folios)){

        //Ruta completa del pdf actual
        $pdf = "../Files/$folio.pdf"; 

        if (file_exists($pdf)){
    
            //Ruta completa de la nueva carpeta
            $nuevaCarpeta = "../Files/Eliminados/"; 
        
            //Ruta completa de la nueva ubicacion del pdf
            $nuevoUbicacion = $nuevaCarpeta . basename($pdf); 
        
            //Imprimimos mensaje
            if (rename($pdf, $nuevoUbicacion)) {
                print("El pdf se elimino exitosamente.") ;
            } else {
                print("<br>Hubo un error al mover el pdf.");
            }
    
        } else {
            print("El archivo pdf no existe");
        }

        //Ruta del xml actual
        $xml = "../Files/$folio.xml";

        if(file_exists($xml)){
            //Ruta completa de la nueva carpeta
            $nuevaCarpeta = "../Files/Eliminados/"; 
            
            //Ruta completa de la nueva ubicacion del xml
            $nuevoUbicacion = $nuevaCarpeta . basename($xml);
            
            //Imprimimos mensaje
            if (rename($xml, $nuevoUbicacion)) {
                print("<br>El xml se elimino exitosamente.") ;
            } else {
                print("<br>Hubo un error al mover el xml.");
            }
        } else {
            print("<br>El archivo xml no existe");
        }
    } else {
        print("El folio no es correcto");
    }
?>