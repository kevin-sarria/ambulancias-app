<?php

session_start();

include('../model/rutas.php');
include('../includes/header.php');
include('../model/conexion.php');

$conexion = conectarDB();

if (!isset($_SESSION['user'])) {
    header('location:' . $carpeta_origen);
}

$id_folder = $_GET['folder'];
$id_ambulancia = $_GET['id'];
$errores = [];


// Verificamos si se ha hecho una peticion de tipo "POST" para empezar con las validaciones
if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    
    $nombre = $_POST['nombre'];
    $archivo = md5(uniqid(rand(), true)) . '.pdf';
    $ubicacion_archivo = $carpeta_archivos . $archivo;


    if (!$nombre || $nombre === '') {
        $errores[] = "Por favor ingresa un nombre valido";
    }


    if ($_FILES['archivo']['size'] >= 5000000) {
        $errores[] = "La archivo es muy pesado, por favor suba uno que pese menos de 5MB";
    }


    if (empty($errores)) {
        move_uploaded_file($_FILES['archivo']['tmp_name'], '../documents/' . $archivo);


        $query = "INSERT INTO `documentos`(`nombre`, `ubicacion`, id_carpeta) VALUES ('$nombre', '$ubicacion_archivo', $id_folder)";
        
        $respuesta = mysqli_query($conexion, $query);

        if($respuesta) {
            header('location:' . $carpeta_vistas . 'documentos.php?folder=' . $id_folder . '&id=' . $id_ambulancia);
        }

    }

}



?>

<section class="centrar-flex">

    <a href="./documentos.php?folder=<?php echo $id_folder; ?>&id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>


    <div class="formulario">
        <form method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre del archivo</label>
            <input type="text" id="nombre" name="nombre">

            <label for="archivo">Archivo</label>
            <input type="file" name="archivo" id="archivo" accept=".pdf">

            <input type="submit" value="Registrar">

        </form>
    </div>


</section>


<?php
include('../includes/footer.php');
?>