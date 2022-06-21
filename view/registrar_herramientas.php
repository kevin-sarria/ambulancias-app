<?php

session_start();

include('../includes/header.php'); 
include('../model/rutas.php');


if(!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}


$id_ambulancia = $_GET['id'];

?>

<section class="contenedor">

<a href="./herramientas.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
    <img src="<?php echo $carpeta_imagen . 'volver.png';?>" alt="img volver">
</a>

    <form action="" method="POST" class="formulario">

        <label for="name">Nombre</label>
        <select name="name" id="name">
            <option value="1">Cuello Ortopedico</option>
            <option value="2">Bomba de Aire</option>
            <option value="3">Jeringa</option>
        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" min='0'>

        <label for="color">Color</label>
        <input type="text" id="color" name="color">

        <input type="submit" value="Registrar">

    </form>

</section>






<?php include('../includes/footer.php'); ?>