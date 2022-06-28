<?php

session_start();

include('../includes/header.php');
include('../model/conexion.php');
include('../model/rutas.php');


if (!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$id_ambulancia = $_GET['id'];


$conexion = conectarDB();

$query = "SELECT * FROM dispositivos_medicos_default";

$resultado = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre_disp = $_POST['nombre'];
    $lote_disp = $_POST['lote'];
    $fecha_vencimiento_disp = $_POST['fecha_vencimiento'];
    $cantidad_disp = $_POST['cantidad'];
    $registro_invima_disp = $_POST['registro_invima'];


    if ($nombre_disp === '') {
        $errores[] = 'El nombre no puede ir vacio';
    }

    if ($lote_disp === '') {
        $errores[] = 'El lote no puede ir vacio';
    }

    if ($fecha_vencimiento_disp === '') {
        $errores[] = 'La fecha de vencimiento no puede ir vacia';
    }

    if ($cantidad_disp === '') {
        $errores[] = 'La cantidad no puede ir vacia';
    }

    if ($registro_invima_disp === '') {
        $errores[] = 'El registro invima no puede ir vacio';
    }

    if (empty($errores)) {

        $query_2 = "INSERT INTO `dispositivos_medicos`( `nombre`, `lote`, `fecha_vencimiento`, `cantidad`, `registro_invima`, `id_ambulancia`) VALUES ('$nombre_disp','$lote_disp','$fecha_vencimiento_disp','$cantidad_disp','$registro_invima_disp','$id_ambulancia')";

        $respuesta_consulta = mysqli_query($conexion, $query_2);
    }
}

?>

<section class="contenedor">

    <a href="./dispositivos_medicos.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
        <img src="<?php echo $carpeta_imagen . 'volver.png'; ?>" alt="img volver">
    </a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" method="POST" class="formulario">

        <label for="nombre">Nombre</label>
        <select name="nombre" id="nombre">

            <?php foreach ($resultado as $result) : ?>

                <option value="<?php echo $result['nombre']; ?>"><?php echo $result['nombre']; ?></option>

            <?php endforeach; ?>

        </select>

        <label for="lote">Lote</label>
        <input type="text" id="lote" name="lote">

        <label for="fecha_vencimiento">Fecha Vencimiento</label>
        <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">

        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" min='0'>

        <label for="registro_invima">Registro Invima</label>
        <input type="text" id="registro_invima" name="registro_invima">

        <input type="submit" value="Registrar">

    </form>

</section>






<?php include('../includes/footer.php'); ?>