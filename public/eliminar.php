<?php
    $folio = $_POST['folio'];

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
            print("Hubo un error al mover el pdf.");
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
            print("El xml se elimino exitosamente.") ;
        } else {
            print("Hubo un error al mover el xml.");
        }
    } else {
        print("El archivo xml no existe");
    }

?>