<?php 

include('../includes/header.php');



if(!isset($_SESSION['user'])) {
    header('location: ../index.php');
}


?>

<main class="contenedor">
    <section class="contenido__principal">
        
    </section>
</main>


<?php include('../includes/footer.php'); ?>