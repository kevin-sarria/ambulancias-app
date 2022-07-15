<?php

session_start();

include('../model/rutas.php');
include('../includes/header.php');
include('../model/conexion.php');

$conexion = conectarDB();

if (!isset($_SESSION['user'])) {
    header('location:' . $carpeta_origen);
}

$id_folder = $_GET['folder'];
$id_ambulancia = $_GET['id'];

// 



?>

<section class="centrar-flex">

    <a href="./documentos.php?folder=<?php echo $folder; ?>&id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>


    <div class="formulario">
        <form method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre del archivo</label>
            <input type="text" id="nombre" name="nombre">

            <label for="archivo">Archivo</label>
            <input type="file" name="archivo" id="archivo" accept=".pdf">

            <input type="submit" value="Registrar">

        </form>
    </div>


</section>


<?php
include('../includes/footer.php');
?>