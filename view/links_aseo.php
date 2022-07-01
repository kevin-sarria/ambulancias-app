<?php

session_start();

include('../model/rutas.php');
include('../includes/header.php');
include('../model/conexion.php');

$conexion = conectarDB();

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

?>

<div class="links__aseo">

    <h3>Link 1</h3>

    <div class="caja__links grid-2-column centrar-grid">

        <div class="info__link">
            <div class="link">
                <a href="https://forms.gle/o3CZZtCvqPfc8iTu8" target="_blank">https://forms.gle/o3CZZtCvqPfc8iTu8</a>
            </div>
        </div>

            <div class="botones">
                <div class="botones__links grid-2-column">
                    <a href="#" class="editar__link btn_amarillo">Editar</a>
                    <a href="#" class="borrar__link btn_rojo">Borrar</a>
                </div>

            </div>
        </div>

    </div>

    <div class="centrar margin-5-top">
        <a href="" class="btn_verde">+ Nuevo Link</a>
    </div>
    

</div>



<?php
include('../includes/footer.php');
?>