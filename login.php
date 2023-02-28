<?php
    //iniciar sesion y la conexion a bd
    require_once 'includes/conexion.php';

    if(isset($_POST)) {
        //borrar error antiguo
        if(isset($_SESSION['error_login'])) {
            unset($_SESSION['error_login']);
        }
        //recoger datos del formulario
        $email = trim($_POST['email']);
        $password = $_POST['password'];
    }

    //consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

        //comprobar contraseña
        $verify = password_verify($password, $usuario['password']);

        if($verify) {
            //utilizar una sesion para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;

        }else {
            //si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else {
        //mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }

    //redirigir el index.php
    header('Location: index.php');
?>