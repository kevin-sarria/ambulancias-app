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
$id_folder = $_GET['folder'];

// Consultamos los links para mostrarlos en el fronted


?>

<section class="centrar-flex">

    <a href="./carpetas.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    



</section>


<?php
include('../includes/footer.php');
?>