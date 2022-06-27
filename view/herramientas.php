<?php

session_start();

include('../includes/header.php');
include('../model/conexion.php');
include('../model/rutas.php');

if (!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$id_ambulancia = $_GET['id'];

$conexion = conectarDB();

$query = "SELECT * FROM herramientas WHERE id_ambulancia='$id_ambulancia'";

$resultado = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado);


?>


<section class="inicio__admin">

<a href="./insumos.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
    <img src="<?php echo $carpeta_imagen . 'volver.png';?>" alt="img volver">
</a>

    <div class="btn_nuevo_medicamento">
        <a href="./registrar_herramientas.php?id=<?php echo $id_ambulancia; ?>" class="btn_verde">+Nueva Herramienta</a>
    </div>

    <div class="contenedor__inicio__admin">
        <h2>Herramientas</h2>

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
                <?php foreach ($resultado as $datos) : ?>
                    <tr>
                        <th data-label="Nombre"><?php echo $datos['nombre']; ?></th>
                        <th data-label="Registro invima"><?php echo $datos['registro_invima']; ?></th>
                        <th data-label="Lote" class="fecha_lote"><?php echo $datos['lote']; ?></th>
                        <th data-label="Fecha Vencimiento" class="fecha_vencimiento"><?php echo $datos['fecha_vencimiento']; ?></th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>





<?php include('../includes/footer.php'); ?>