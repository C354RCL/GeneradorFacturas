<?php
    $rfc = $_POST['rfc'];
    $pwd = $_POST['pwd'];

    include("../Controlador.php");
    
    $con = Conectar();
    $sql = "SELECT * FROM cuentas WHERE rfc = '$rfc';";
    $result = Ejecutar($con, $sql);
    
    $nFilas = mysqli_num_rows($result);
    
    $rfc = mysqli_real_escape_string($con, $rfc);
    $pwd = mysqli_real_escape_string($con, $pwd);
    if($nFilas == 1){
        print("\nEl usuario existe\n");
        $fila=mysqli_fetch_row($result);
        if($pwd == $fila[1]){
            // print("\nContraseña correcta\n");
            if($fila[3] == 1){
                // print("\nLa cuenta esta activa\n");

                if($fila[4] == 0){
                    print("\nSin bloqueo\n");
                    print("Entrar");
                    $sql4 = "UPDATE cuentas SET intentos = 0 WHERE rfc = '$rfc';";
                    $result = Ejecutar($con, $sql4);
                    if($fila[2] == "U"){
                        
                        // Generar un token único
                        $token = uniqid();

                        // Guardar el token en la sesión o en la base de datos junto con la información del usuario
                        $_SESSION['token'] = $token;

                        // Redirigir a la página principal o a cualquier otra página después del inicio de sesión exitoso
                        header("Location: menuUsuario.html");
                        exit();


                        // print("\nUsuario");
                        // header("Location: menuUsuario.html");
                        exit;
                    }else{

                        // Generar un token único
                        $token = uniqid();

                        // Guardar el token en la sesión o en la base de datos junto con la información del usuario
                        $_SESSION['token'] = $token;

                        // Redirigir a la página principal o a cualquier otra página después del inicio de sesión exitoso
                        header("Location: menuAdmin.html");
                        exit();

                        // print("\nAdministrador\n"); 
                        // header("Location: menuAdmin.html");
                        exit;
                    }

                }else{
                    // print("\nBloqueada\n");
                }

            }else{
                // print("\nLa no cuenta esta activa\n");
            }
        }else{
            print("\nContraseña incorrecta\n");
            $sql2 = "UPDATE cuentas SET intentos = intento+1 WHERE rfc = '$rfc';";
            $result = Ejecutar($con, $sql2);
            if($fila[5] == 3) {
                $sql3 = "UPDATE cuentas SET bloqueo = 1 WHERE rfc = '$rfc';";
                $result = Ejecutar($con, $sql3);
            }
        }
    }else{
        print("\nUsuario y/o contrasela incorrectos, intentelo nuevamente\n");
    }

    Desconectar($con);
?>