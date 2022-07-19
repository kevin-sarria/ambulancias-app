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

// Consultamos los archivos para mostrarlos en el fronted
$query = "SELECT * FROM documentos where id_carpeta = $id_folder";
$respuesta = mysqli_query($conexion, $query);
mysqli_fetch_assoc($respuesta);


?>

<section class="centrar-flex">

    <a href="<?php echo $carpeta_vistas . 'documentos.php?folder=' . $id_folder . '&id=' . $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <div class="contenedor__borrar__archivos">
            <h2 class="color_red centrar">¿Qué documentos desea eliminar?</h2>

            <table class="tabla_inicio_admin">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Ubicacion</td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($respuesta as $datos): ?>
                    <tr>
                        <th data-label = "Nombre" ><?php echo $datos['nombre']; ?></th>
                        <th data-label = "Ubicacion" ><?php echo $datos['ubicacion']; ?></th>
                        <th><a href="<?php echo $carpeta_vistas . 'borrar_archivo.php?folder=' . $id_folder . '&id=' . $id_ambulancia . '&doc=' . $datos['id'] ?>" class="color_red">Eliminar</a></th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


</section>


<?php
include('../includes/footer.php');
?>