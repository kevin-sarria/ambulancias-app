<?php

session_start();

if(!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

include('../includes/header.php');
include('../model/conexion.php');


$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = $_POST['placa'];
    @$tipo_ambulancia = $_POST['tipo_ambulancia'];
    $imagen = '/ambulancias-app/img/' . $_FILES['imagen']['name'];

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
        move_uploaded_file($_FILES['imagen']['tmp_name'], '/ambulancias-app/img/');
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
            <option value="1">1</option>
            <option value="2">2</option>
        </select>

        <label for="imagen">Imagen de la ambulancia</label>
        <input type="file" name="imagen" id="imagen" accept=".png, .jpg, .jpeg">

        <input type="submit" value="Registrar">

    </form>

</section>






<?php include('../includes/footer.php'); ?>