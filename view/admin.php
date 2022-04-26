<?php

session_start();

include('../includes/header.php');
include('../model/conexion.php');

$conexion = conectarDB();

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

$query = "SELECT nombre, registro_invima, lote, fecha_vencimiento FROM medicamentos ORDER BY fecha_vencimiento ASC";

$respuesta = mysqli_query($conexion, $query);

mysqli_fetch_assoc($respuesta);


?>

    <section class="inicio__admin">
        <div class="contenedor__inicio__admin">
            <h2>Insumos proximos a vencer</h2>

            <table class="tabla_inicio_admin">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Registro Invima</td>
                        <td>Lote</td>
                        <td>Fecha Vencimiento</td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($respuesta as $datos): ?>
                    <tr>
                        <th data-label = "Nombre" ><?php echo $datos['nombre']; ?></th>
                        <th data-label = "Registro invima" ><?php echo $datos['registro_invima']; ?></th>
                        <th data-label = "Lote"  class="fecha_lote"><?php echo $datos['lote']; ?></th>
                        <th data-label = "Fecha Vencimiento"  class="fecha_vencimiento"><?php echo $datos['fecha_vencimiento']; ?></th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="link_ver_mas">
                <a href="#">Ver Más >>></a>
            </div>
        </div>
    </section>

<script src = "../js/inicio_admin.js" type="module"></script>

<?php include('../includes/footer.php'); ?>