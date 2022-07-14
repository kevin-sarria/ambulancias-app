<?php

session_start();

include('../model/rutas.php');
include('../includes/header.php');
include('../model/conexion.php');

$conexion = conectarDB();

if (!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$id_ambulancia = $_GET['id'];
$errores = [];

// Validamos que se haya hecho una petición de tipo POST para hacer las validaciones y su debida subida a la BD

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];

    // Validamos que el nombre no este vacio.

    if ($nombre === '' || $nombre === null) {
        $errores[] = "Error: El nombre no puede ir vació";
    }

    // Validamos que no hayan errores.

    if (empty($errores)) {

        // Hacemos la debida consulta para insertar los datos a la BD
        $query_folder = "INSERT INTO `carpetas_documentos`(`nombre`, `id_ambulancia`) VALUES ('$nombre','$id_ambulancia')";

        $resultado_folder = mysqli_query($conexion, $query_folder);

        if ($resultado_folder) {
            header('location:' . $carpeta_vistas . 'carpetas.php?id=' . $id_ambulancia);
        }
    }
}


?>

<section class="centrar-flex">

    <a href="./carpetas.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="formulario">
        <form method="POST">

            <label for="nombre">Nombre de la carpeta</label>
            <input type="text" name="nombre" id="nombre" required>

            <input type="submit" value="Registrar">

        </form>
    </div>


</section>


<?php
include('../includes/footer.php');
?>