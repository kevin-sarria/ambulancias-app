<?php

session_start();

include('../includes/header.php');
include('../model/conexion.php');
include('../model/rutas.php');


if(!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$id_ambulancia = $_GET['id'];



$conexion = conectarDB();

$query = "SELECT * FROM herramientas_default";

$resultado = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre_herr = $_POST['nombre'];
    $cantidad_herr = $_POST['cantidad'];
    $color_herr = $_POST['color'];

    if ($nombre_herr === '') {
        $errores[] = 'El nombre no puede ir vacio';
    }

    if ($cantidad_herr === '') {
        $errores[] = 'La cantidad no puede ir vacia';
    }

    if ($color_herr === '') {
        $errores[] = 'El color no puede ir vacio';
    }

    

    if (empty($errores)) {

        $query_2 = "INSERT INTO `herramientas`( `nombre`, `cantidad`, `color`, `id_ambulancia`) VALUES ('$nombre_herr', '$cantidad_herr','$color_herr','$id_ambulancia')";

        $respuesta_consulta = mysqli_query($conexion, $query_2);
    }
}


?>

<section class="contenedor">

<a href="./herramientas.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
    <img src="<?php echo $carpeta_imagen . 'volver.png';?>" alt="img volver">
</a>

<?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" method="POST" class="formulario">

        <label for="nombre">Nombre</label>
        <select name="nombre" id="nombre">

        <option value="" selected> -- Seleccione una Opción -- </option>

        <?php foreach( $resultado as $result ): ?>

            <option value="<?php echo $result['nombre']; ?>"><?php echo $result['nombre']; ?></option>

        <?php endforeach; ?>

        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" min='0'>

        <label for="color">Color</label>
        <input type="text" id="color" name="color">

        <input type="submit" value="Registrar">

    </form>

</section>






<?php include('../includes/footer.php'); ?>