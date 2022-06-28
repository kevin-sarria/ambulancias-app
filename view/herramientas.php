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
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <div class="btn_nuevo_medicamento">
        <a href="./registrar_herramientas.php?id=<?php echo $id_ambulancia; ?>" class="btn_verde">+Nueva Herramienta</a>
    </div>

    <?php if ($resultado->num_rows) : ?>

        <div class="contenedor__inicio__admin">
            <h2>Dispositivos Medicos</h2>

            <table class="tabla_inicio_admin">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Cantidad</td>
                        <td>Color</td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($resultado as $datos) : ?>
                        <tr>
                            <th data-label="Nombre"><?php echo $datos['nombre']; ?></th>
                            <th data-label="Registro invima"><?php echo $datos['cantidad']; ?></th>
                            <th data-label="Lote"><?php echo $datos['color']; ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : echo '<div class="alerta neutro">Por favor Registra Información</div>' ?>

    <?php endif; ?>
    <!-- Termina condicional si tiene información -->
</section>





<?php include('../includes/footer.php'); ?>