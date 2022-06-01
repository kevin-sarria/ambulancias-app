<?php

session_start();

if(!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

include('../includes/header.php');
include('../model/conexion.php');


$conexion = conectarDB();
$query = "SELECT * FROM `tipo_ambulancia`";
$respuesta = mysqli_query($conexion, $query);

mysqli_fetch_assoc($respuesta);


$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = $_POST['placa'];
    @$tipo_ambulancia = $_POST['tipo_ambulancia'];
    $imagen = md5(uniqid(rand(), true)) . '.jpg';

    if(!$placa) {
        $errores[] = "Por favor ingresa la placa de la ambulancia<br>";
    }

    if(!$tipo_ambulancia) {
        $errores[] = "Por favor ingresa el tipo de ambulancia<br>";
    }

    if(!$_FILES['imagen']['name']) {
        $errores[] = "Por favor suba una imagen para reconocer la ambulancia<br>";
    }

    if(empty($errores)) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], '../img/' . $imagen);

        $conexion = conectarDB();
        $query = "INSERT INTO `ambulancia`(`placa`, `id_tipo_ambulancia`, `imgaen`) VALUES ('$placa','$tipo_ambulancia','/ambulancias-app/img/$imagen')";
        $respuesta = mysqli_query($conexion, $query);

    }

}


?>

<section class="registrar-ambulancia">

<?php foreach( $errores as $error ): ?>
    <div class="alerta error">
    
    <?php echo $error; ?>

    </div>
    <?php endforeach; ?>


    <form method="POST" class="formulario form-crear-ambulancia" enctype="multipart/form-data">
            
        <label for="placa">Placa</label>
        <input type="text" id="placa" name="placa">

        <label for="tipo_ambulancia">Tipo de ambulancia</label>
        <select name="tipo_ambulancia" id="tipo_ambulancia">
            <option value="0" disabled selected>-- Seleccione una opción --</option>
            <?php foreach($respuesta as $r): ?>
                <option value="<?php echo $r['id']; ?>">
                    <?php echo $r['nombre']; ?>
                </option>
            <?php endforeach; ?>

        </select>

        <label for="imagen">Imagen de la ambulancia</label>
        <input type="file" name="imagen" id="imagen" accept=".png, .jpg, .jpeg">

        <input type="submit" value="Registrar">

    </form>

</section>






<?php include('../includes/footer.php'); ?>