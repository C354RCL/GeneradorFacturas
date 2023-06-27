<?php
    $rfc = $_POST['rfc'];
    $pwd = $_POST['pwd'];

    include("../Controlador.php");

$con = Conectar();
$sql = "SELECT * FROM cuentas WHERE rfc = '$rfc'";
$result = Ejecutar($con, $sql);

$nFilas = mysqli_num_rows($result);

    if($nFilas == 1){
        print("\nEl usuario existe\n");
        $fila=mysqli_fetch_row($result);
        
        //condicion de contrasela correcta
        if($pwd == $fila[1]){
            
            //Condicion de cuenta activa
            if($fila[3] == 1){
                
                //Condicion si la contraseña esta sin bloqueo
                if($fila[4] == 0){

                    $sql4 = "UPDATE cuentas SET intentos = 0 WHERE rfc = '$rfc';";
                    $result = Ejecutar($con, $sql4);

                    //Si es Usuario mandar a menuUsuario.html
                    if($fila[2] == "U"){
                        header("Location: menuUsuario.html");
                        exit;
                    }
                    //Si es administrador mandar a menuAdmin
                    else{
                        header("Location: menuAdmin.html");
                        exit;
                    }
                }
            }
        } else{
            print("\nContraseña incorrecta\n");
            $sql2 = "UPDATE cuentas SET intentos = intento+1 WHERE rfc = '$rfc';";
            $result = Ejecutar($con, $sql2);
            if($fila[5] == 3) {
                $sql3 = "UPDATE cuentas SET bloqueo = 1 WHERE rfc = '$rfc';";
                $result = Ejecutar($con, $sql3);
            }
        }
    } else{
        print("\nEl usuario no existe\n");
    }

Desconectar($con);
?>
