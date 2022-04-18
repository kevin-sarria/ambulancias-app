<?php

require 'model/conexion.php';
include('includes/header.php');

$conexion = conectarDB();


if(isset($_SESSION['user'])) {
    header('location: view/admin.php');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE correo = '${email}'";

    $respuesta = mysqli_query($conexion, $query);


    

    if ($respuesta->num_rows) {

        $user = mysqli_fetch_assoc($respuesta);
        session_start();
        $_SESSION['user'] = $user['correo'];
        header('location: /view/admin.php');
    } else {
        echo "La contraseña es incorrecta";
    }
}




?>

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





<?php

mysqli_close($conexion);
include('includes/footer.php');

?>


