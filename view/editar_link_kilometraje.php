<?php

session_start();

include('../model/rutas.php');
include('../includes/header.php');
include('../model/conexion.php');

$conexion = conectarDB();

if (!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$errores = [];
$id_ambulancia = $_GET['id'];
$id_link_kilometraje = $_GET['id-link-kilometraje'];

// Hacemos la consulta para traer los datos del link
$query = "SELECT * FROM links_kilometraje WHERE id=$id_link_kilometraje";

$resultado_link = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado_link);


// Revisamos que se haya enviado una peticion mediante el formulario por el metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];

    if ($titulo === '' || $titulo === null) {
        $errores[] = "El titulo no puede ir vacio...";
    }

    if ($link === '' || $link === null) {
        $errores[] = "El link no puede ir vacio...";
    }

    if (empty($errores)) {
        $query_2 = "UPDATE `links_kilometraje` SET `nombre_link`='$titulo',`link`='$link' WHERE id=$id_link_kilometraje";
        $respuesta = mysqli_query($conexion, $query_2);

        if ($respuesta) {
            header('Location:' . $carpeta_vistas . 'links_kilometraje.php?id=' . $id_ambulancia);
        }
    }
}

?>

<div class="volver">
    <a href="<?php echo $carpeta_vistas . 'links_kilometraje.php?id=' . $id_ambulancia ?>"><img src="<?php echo $carpeta_imagen . 'volver.png' ?>" alt="imagen volver"></a>
</div>

<?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
<?php endforeach; ?>
<?php foreach ($resultado_link as $result) : ?>
    <div class="formulario">
        <form action="" method="POST">

            <label for="titulo">Titulo del link</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $result['nombre_link']; ?>">

            <label for="link">Link</label>
            <input type="text" id="link" name="link" value="<?php echo $result['link']; ?>">

            <input type="submit" value="Actualizar">

        </form>
    </div>
<?php endforeach; ?>



<?php
include('../includes/footer.php');
?>