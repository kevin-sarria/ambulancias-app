<?php 

include('../includes/header.php');



if(!isset($_SESSION['user'])) {
    header('location: ../index.php');
}


?>

<main class="contenedor">
    <section class="contenido__principal">
        <div class="ambulancia">
            <h3>Ambulancia Medicalizada</h3>
            <h4>Placa: A32-03M</h4>
            <img src="/img/logo.png" alt="">
        </div>
        
        <div class="ambulancia">
            <h3>Ambulancia Medicalizada</h3>
            <h4>Placa: A32-03M</h4>
            <img src="/img/logo.png" alt="">
        </div>

        <div class="ambulancia">
            <h3>Ambulancia Medicalizada</h3>
            <h4>Placa: A32-03M</h4>
            <img src="/img/logo.png" alt="">
        </div>

        <div class="ambulancia">
            <h3>Ambulancia Medicalizada</h3>
            <h4>Placa: A32-03M</h4>
            <img src="/img/logo.png" alt="">
        </div>

        <div class="ambulancia">
            <h3>Ambulancia Medicalizada</h3>
            <h4>Placa: A32-03M</h4>
            <img src="/img/logo.png" alt="">
        </div>

        <div class="ambulancia">
            <h3>Ambulancia Medicalizada</h3>
            <h4>Placa: A32-03M</h4>
            <img src="/img/logo.png" alt="">
        </div>
    </section>
</main>


<?php include('../includes/footer.php'); ?>