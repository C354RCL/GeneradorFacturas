<?php
    function Conectar(){
        $server = 'localhost';
        $user = 'root';
        $psw = '';
        $bd = 'facturaselectronicas';
        //mysqli_concect devuelve un objeto 
        $conexion = mysqli_connect($server, $user, $psw, $bd);
        return $conexion;
    }

    function Ejecutar($conexion, $comando){
        $result = mysqli_query($conexion, $comando) or die(mysqli_error($conexion));
        return $result;
    }

    function Procesar(){

    }

    function Desconectar($conexion){
        $result = mysqli_close($conexion);
        return $result;
    }
?>