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

// Consultamos los archivos para mostrarlos en el fronted
$query = "SELECT * FROM carpetas_documentos where id_ambulancia = $id_ambulancia";
$respuesta = mysqli_query($conexion, $query);
mysqli_fetch_assoc($respuesta);

echo $query . '<br>';

foreach($respuesta as $resp) {

    echo $resp['nombre'] . '<br>';

};

exit;

// Revisamos si se recibio una peticion de tipo "POST" para ejecutar la consulta de borrar archivo...

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    foreach($respuesta as $resp) {

        $new_ubi = str_replace('/ambulancias-app', '..', $resp['ubicacion']);
    
        $borrar = $new_ubi;

    };

    $doc_delete = unlink($borrar);

    echo $doc_delete;

    

    $query_delete = "DELETE FROM `documentos` WHERE id = $id_doc";

    $resultado = mysqli_query($conexion, $query_delete);

    if($resultado && $doc_delete) {
        header('location:' . $carpeta_vistas . 'borrar_archivos.php?folder=' . $id_folder . '&id=' . $id_ambulancia );
    }

}



?>

<section class="centrar-flex">



    <?php foreach ($respuesta as $resp) : ?>

        <form method="POST">

            <h2 class="color_red centrar mb-5">¿Seguro que desea eliminar "<?php echo $resp['nombre']; ?>"?</h2>

            <div class="grid-2-column">
                <a href="<?php echo $carpeta_vistas . 'borrar_archivos.php?folder=' . $id_folder . '&id=' . $id_ambulancia; ?>" class="btn_amarillo">Cancelar</a>

                <input type="submit" value="Si, Eliminar" class="btn_rojo">
            </div>

        </form>

    <?php endforeach; ?>


</section>


<?php
include('../includes/footer.php');
?>