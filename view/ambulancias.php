<?php 

session_start();

include('../includes/header.php');
include('../model/conexion.php');

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

$conexion = conectarDB();
$query = "SELECT * FROM ambulancia A JOIN tipo_ambulancia TA ON A.id_tipo_ambulancia = TA.id";
$respuesta = mysqli_query($conexion, $query);

mysqli_fetch_assoc($respuesta);

?>

    <section class="contenido__principal">

        <?php foreach($respuesta as $ambulancia): ?>
        <div class="ambulancia">
        <a href="#">
            <h3>Ambulancia <?php echo $ambulancia['nombre']; ?></h3>
            <h4>Placa: <?php echo $ambulancia['placa']; ?></h4>
            <img src="<?php echo $ambulancia['imgaen']; ?>" alt="">
            </a>
        </div>
        <?php endforeach; ?>

    </section>


<?php include('../includes/footer.php'); ?>