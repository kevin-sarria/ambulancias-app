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

// Consultamos los archivos para mostrarlos en el fronted
$query = "SELECT * FROM documentos where id_carpeta = $id_folder";
$resultado = mysqli_query($conexion, $query);
mysqli_fetch_assoc($resultado);


?>

<section class="centrar-flex">

    <a href="./carpetas.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <div class="boton_div">
        <a href="<?php echo $carpeta_vistas . 'crear_documento.php?folder=' . $id_folder . '&id=' . $id_ambulancia; ?>" class="btn_verde">Nuevo Documento</a>
    </div>

    <?php

    if($resultado->num_rows):

        foreach($resultado as $result):
    ?>
    
        <div class="documentos">
            <div class="documento">
                <a href="<?php echo $result['ubicacion']; ?>" target="_blank">
                    <h3><?php echo $result['nombre']; ?></h3>
                    <img src="<?php echo $carpeta_imagen . 'pdf.png'; ?>" alt="Icono PDF">
                </a>
            </div>
        </div>

    <?php

        endforeach;

            else:      
    ?>
            <p class="alerta neutro">No hay ningún dato registrado, Da click en el boton de Nuevo Documento para añadir uno nuevo</p>
    <?php
        endif;
    ?>



</section>


<?php
include('../includes/footer.php');
?>