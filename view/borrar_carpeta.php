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
$id_folder = $_GET['folder'];

// Consultamos los datos para hacer despues el proceso de borrado
$query = "SELECT * FROM carpetas_documentos where id = $id_folder";
$respuesta = mysqli_query($conexion, $query);
mysqli_fetch_assoc($respuesta);

// Consultamos los datos para hacer despues el proceso de borrado
$query_2 = "SELECT * FROM documentos where id_carpeta = $id_folder";
$resultado = mysqli_query($conexion, $query_2);
mysqli_fetch_assoc($resultado);

// Revisamos si se recibio una peticion de tipo "POST" para ejecutar la consulta de borrar carpetas...

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    


    foreach($resultado as $result) {
    
        $id_doc[] = $result['id'];


        for ($i=0; $i < 1; $i++) { 
            
            $new_ubi[] = str_replace('/ambulancias-app', '..', $result['ubicacion']);
    
            $borrar[$i] = end($new_ubi);

            $doc_delete = unlink($borrar[$i]);


        }

    };
    

    for ($i=0; $i < count($id_doc); $i++) { 
        $query_delete[$i] = "DELETE FROM `documentos` WHERE id = $id_doc[$i]";

        $delete[$i] = mysqli_query($conexion, $query_delete[$i]);
    }

    $query_delete_2 = "DELETE FROM `carpetas_documentos` where id = $id_folder";

    $delete_2 = mysqli_query($conexion, $query_delete_2);

    if($delete_2) {
        header('location:' . $carpeta_vistas . 'borrar_carpetas.php?id=' . $id_ambulancia );
    }

}



?>

<section class="centrar-flex">



    <?php foreach ($respuesta as $resp) : ?>

        <form method="POST">

            <h3 class="color_red centrar mb-5">¿Seguro que desea eliminar "<?php echo $resp['nombre']; ?>" y todos los archivos que contiene dentro?</h3>

            <div class="grid-2-column">
                <a href="<?php echo $carpeta_vistas . 'borrar_carpetas.php?id=' . $id_ambulancia; ?>" class="btn_amarillo">Cancelar</a>

                <input type="submit" value="Si, Eliminar" class="btn_rojo">
            </div>

        </form>

    <?php endforeach; ?>


</section>


<?php
include('../includes/footer.php');
?>