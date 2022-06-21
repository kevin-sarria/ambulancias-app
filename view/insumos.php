<?php

session_start();

include('../includes/header.php');
include('../model/rutas.php');

if (!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$id_ambulancia = $_GET['id'];

?>

<section class="centrar-flex">

<a href="./ver_info_ambulancia.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
    <img src="<?php echo $carpeta_imagen . 'volver.png';?>" alt="img volver">
</a>

    <div class="insumos">
    <a href="/ambulancias-app/view/medicamentos.php?id=<?php echo $id_ambulancia; ?>"><div class="tipo_insumo">
        <h3>medicamentos</h3>
        <img src="/ambulancias-app/img/medicamentos.png" alt="Logo Medicamentos">
    </div></a>

    <a href="/ambulancias-app/view/dispositivos_medicos.php?id=<?php echo $id_ambulancia; ?>"><div class="tipo_insumo">
    <h3>Dispositivos Medicos</h3>
        <img src="/ambulancias-app/img/jeringa.png" alt="Logo Dispositivos Medicos">
    </div></a>

    <a href="/ambulancias-app/view/herramientas.php?id=<?php echo $id_ambulancia; ?>"><div class="tipo_insumo">
    <h3>Herramientas</h3>
        <img src="/ambulancias-app/img/herramienta.png" alt="Logo Herramientas">
    </div></a>
    </div>


</section>









<?php include('../includes/footer.php'); ?>