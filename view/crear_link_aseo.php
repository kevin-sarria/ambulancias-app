<?php

    session_start();

    include('../model/conexion.php');
    include('../model/rutas.php');
    include('../includes/header.php');

    $conexion = conectarDB();

    if (!isset($_SESSION['login'])) {
        header('location:' . $carpeta_origen);
    } else if( $_SESSION['user'] != '1' ) {
        header('location:' . $carpeta_origen);
    }

    
    $id_ambulancia = $_GET['id'];


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $nombre_link = $_POST['nombre_link'];
        $link = $_POST['link'];


        $query = "INSERT INTO `links_aseo`(`nombre_link`, `link`, `id_ambulancia`) VALUES ('$nombre_link','$link','$id_ambulancia')";
        
        $resultado = mysqli_query($conexion, $query);

        if($resultado) {
            header('location:' . $carpeta_vistas . 'links_aseo.php?id=' . $id_ambulancia);
        }

    }

?>


<form action="#" method="POST" class="formulario">

    <label for="nombre_link">Nombre del link</label>
    <input type="text" id="nombre_link" name="nombre_link">

    <label for="link">Link</label>
    <input type="text" id="link" name="link">

    <input type="submit" value="Registrar Link">

</form>




<?php
    include('../includes/footer.php');
?>