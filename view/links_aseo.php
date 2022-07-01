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
$query = "SELECT * FROM `links_aseo` WHERE id_ambulancia = $id_ambulancia";

$resultado = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado);

?>

<?php foreach( $resultado as $result ): ?>

<div class="links__aseo">

    <h3><?php echo $result['nombre_link']; ?></h3>

    <div class="caja__links grid-2-column centrar-grid">

        <div class="info__link">
            <div class="link">
                <a href="<?php echo $result['link']; ?>" target="_blank"><?php echo $result['link']; ?></a>
            </div>
        </div>

            <div class="botones">
                <div class="botones__links grid-2-column">
                    <a href="<?php echo './editar_link_aseo.php?id=' . $id_ambulancia . '&id-link-aseo=' . $result['id']; ?>" class="editar__link btn_amarillo">Editar</a>
                    <a href="#" class="borrar__link btn_rojo">Borrar</a>
                </div>

            </div>
        </div>

    </div>

</div>

<?php endforeach; ?>


<div class="centrar margin-5-top">
        <a href="<?php echo $carpeta_vistas . 'crear_link_aseo.php?id=' . $id_ambulancia ?>" class="btn_verde">+ Nuevo Link</a>
    </div>

<?php
include('../includes/footer.php');
?>