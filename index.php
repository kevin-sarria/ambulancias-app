<?php

require 'model/conexion.php';
include('includes/header.php');

$conexion = conectarDB();


if (isset($_SESSION['user'])) {
    header('location: view/admin.php');
}

$errores = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($conexion, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    if (!$password) {
        $errores[] = "La contraseña es incorrecta o no es valida<br>";
    }

    if (!$email) {
        $errores[] = "El correo es incorrecto o no es valido<br>";
    }

    if (empty($errores)) {
        // Revisar si el usuario existe
        $query = "SELECT * FROM `users` WHERE correo = '${email}'";
        $respuesta = mysqli_query($conexion, $query);

        if ($respuesta->num_rows) {

            // Volver el array asociativo para acceder mas faicl a la información
            $usuario = mysqli_fetch_assoc($respuesta);

            // Verificar si la contraseña es correcta
            $auth = password_verify($password, $usuario['password']);

            if($auth) {
                // Iniciamos la sesion
                session_start();

                // Llenamos el arreglo de la sesion
                $_SESSION['user'] = $usuario['correo'];
                $_SESSION['login'] = true;

                // Redireccionamos a la pagina deseada
                header('location: ./view/admin.php');
            } else {
                $errores[] = "La contraseña es incorrecta";
            }
            
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}




?>

<?php foreach ($errores as $error) : ?>
    <div class="alerta error">

        <?php echo $error; ?>

    </div>

<?php endforeach; ?>

<div class="caja-formulario">

    <form method="POST" class="formulario">

        <h3>Iniciar sesión</h3>

        <label for="email">Correo</label>
        <input type="email" name="email" id="email" placeholder="Tu correo aqui">

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Tu contraseña aqui">

        <input type="submit" value="Ingresar">

    </form>

</div>


<main class="contenedor">



</main>







<?php

mysqli_close($conexion);
include('includes/footer.php');

?>