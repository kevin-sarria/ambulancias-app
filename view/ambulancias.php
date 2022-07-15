<?php

session_start();

include('../includes/header.php');
include('../model/rutas.php');
include('../model/conexion.php');

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

$conexion = conectarDB();
$query = "SELECT A.id, placa, imagen, nombre FROM ambulancia A JOIN tipo_ambulancia TA ON A.id_tipo_ambulancia = TA.id";
$respuesta = mysqli_query($conexion, $query);

mysqli_fetch_assoc($respuesta);

?>

<section class="contenido__principal">

    <?php

        if( $_SESSION['user'] == 1 ):
        
    ?>
            <div class='ambulancia'>
                <a href='<?php echo $carpeta_vistas . 'crear_ambulancia.php'; ?>'>
                    <h3>Nueva Ambulancia</h3>
                    <img src='<?php echo $carpeta_imagen . 'ambulancia.png' ?>' alt='Logo Ambulancia'>
                </a>
            </div>
    <?php
    
        endif;

    ?>

    <?php foreach ($respuesta as $ambulancia) : ?>
        
        <div class="ambulancia">
            <a href="/ambulancias-app/view/ver_info_ambulancia.php?id=<?php echo $ambulancia['id'] ?>">
                <h3>Ambulancia <?php echo $ambulancia['nombre']; ?></h3>
                <h4>Placa: <?php echo $ambulancia['placa']; ?></h4>
                <img src="<?php echo $ambulancia['imagen']; ?>" alt="">
            </a>
        </div>
    <?php endforeach; ?>



</section>


<?php include('../includes/footer.php'); ?>