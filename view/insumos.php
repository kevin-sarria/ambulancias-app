<?php

session_start();

include('../includes/header.php');

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

?>


<section class="insumos">
    <a href="/ambulancias-app/view/medicamentos.php"><div class="tipo_insumo">
        <h3>medicamentos</h3>
        <img src="/ambulancias-app/img/medicamentos.png" alt="Logo Medicamentos">
    </div></a>

    <a href="/ambulancias-app/view/dispositivos_medicos.php"><div class="tipo_insumo">
    <h3>Dispositivos Medicos</h3>
        <img src="/ambulancias-app/img/jeringa.png" alt="Logo Dispositivos Medicos">
    </div></a>

    <a href="/ambulancias-app/view/herramientas.php"><div class="tipo_insumo">
    <h3>Herramientas</h3>
        <img src="/ambulancias-app/img/herramienta.png" alt="Logo Herramientas">
    </div></a>
</section>









<?php include('../includes/footer.php'); ?>