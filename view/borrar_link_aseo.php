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
$id_link_aseo = $_GET['id-link-aseo'];

// Hacemos la consulta para traer los datos del link
$query = "SELECT * FROM links_aseo WHERE id=$id_link_aseo";

$resultado_link = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado_link);

// Revisamos que se haya enviado una peticion mediante el boton por el metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $query_2 = "DELETE FROM `links_aseo` WHERE id=$id_link_aseo";

    $respuesta = mysqli_query($conexion, $query_2);

    if ($respuesta) {
        header('Location:' . $carpeta_vistas . 'links_aseo.php?id=' . $id_ambulancia);
    }
}

?>




<?php foreach ($resultado_link as $result) : ?>
    <div class="centrar">
        <form method="POST">

            <h2 class="color_red no-margin">¿Desea eliminar el link "<?php echo $result['nombre_link']; ?>"?</h2>

            <div class="grid-2-column">
                <a href="<?php echo $carpeta_vistas . 'links_aseo.php?id=' . $id_ambulancia ?>" class="botones btn_amarillo">Cancelar</a>

                <input type="submit" value="Si, eliminar" class="botones btn_rojo">
            </div>

        </form>
    </div>
<?php endforeach; ?>


<?php
include('../includes/footer.php');
?>