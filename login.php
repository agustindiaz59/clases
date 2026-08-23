<?php

include_once("bd.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    iniciarSesion();
}



function iniciarSesion()
{
    //Obtiene los datos del formulario eliminando los espacios en blanco
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);
    
    //Busca el usuario en la base de datos
    $usuarioBD = select("SELECT nombre, contrasenia, rol FROM usuario u WHERE u.nombre = '$usuario' AND u.contrasenia = '$password' LIMIT 1");


    //Si el usuario es correcto lo guarda en la variable $_SESSION para futuras solicitudes
    if(!empty($usuarioBD)){
        $_SESSION["usuarioBD"] = $usuarioBD[0]; 

        if($usuarioBD[0]["rol"] == "ADMIN"){
            header("Location: index.php"); //En caso de un login exitoso te redirige al principal
        }else{
            header("Location: detalles.php"); //En caso de un login exitoso te redirige al principal
        }
        exit;
    }else{ //Caso en que el usuario sea incorrecto vuelve a reiniciar el login
        
        session_abort();
        header("Location: login.php?error=true", true, 302); //En caso de fallar te vuelve a mandar a login
        exit;
    }
    
    
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Iniciar Sesión</h2>

                        <form action="login.php" method="POST">

                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    Usuario
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="usuario"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Contraseña
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Ingresar
                            </button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>