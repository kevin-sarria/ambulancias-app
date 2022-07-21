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

    <div class="contenedor__borrar__archivos">
            <h2 class="color_red centrar">¿Qué carpetas desea eliminar?</h2>

            <table class="tabla_inicio_admin">
                <thead>
                    <tr>
                        <td>Nombre</td>
                    </tr>

                </thead>

                <tbody>
                    <?php foreach($resultado as $datos): ?>
                    <tr>
                        <th data-label = "Nombre" ><?php echo $datos['nombre']; ?></th>
                        <th><a href="<?php echo $carpeta_vistas . 'borrar_carpeta.php?id=' . $id_ambulancia; ?>" class="color_red">Eliminar</a></th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

</section>


<?php
include('../includes/footer.php');
?>