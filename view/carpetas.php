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

// Consultamos los links para mostrarlos en el fronted
$query = "SELECT * FROM carpetas_documentos where id_ambulancia = $id_ambulancia";
$resultado = mysqli_query($conexion, $query);
mysqli_fetch_assoc($resultado);


?>

<section class="centrar-flex">

    <a href="./ver_info_ambulancia.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <div class="carpetas">

        <div class="carpeta crear_carpeta">
            <a href="<?php echo $carpeta_vistas . 'crear_carpeta.php?id=' . $id_ambulancia; ?>">
                <h3>Nueva Carpeta</h3>
                <img src="<?php echo $carpeta_imagen . 'mas.png' ?>" alt="Imagen Boton Más">
            </a>
        </div>

        <?php foreach ($resultado as $result) : ?>

            <div class="carpeta">
                <a href="<?php echo $carpeta_vistas . 'documentos.php?folder=' . $result['id'] . '&id=' . $id_ambulancia; ?>">
                    <h3><?php echo $result['nombre']; ?></h3>
                    <img src="<?php echo $carpeta_imagen . 'folder.png' ?>" alt="Imagen folder">
                </a>
            </div>

        <?php endforeach; ?>

    </div>



</section>


<?php
include('../includes/footer.php');
?>