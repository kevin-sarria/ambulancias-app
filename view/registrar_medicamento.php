<?php

session_start();

include('../includes/header.php'); 
include('../model/rutas.php');
include('../model/conexion.php');


if(!isset($_SESSION['login'])) {
    header('location:' . $carpeta_origen);
}

$id_ambulancia = $_GET['id'];

$conexion = conectarDB();

$query_med = "SELECT * FROM medicamentos_default";

$result_med = mysqli_query($conexion, $query_med);

mysqli_fetch_assoc($result_med);

$errores = [];

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    
    $nombre_med = $_POST['nombre'];
    $lote_med = $_POST['lote'];
    $fecha_vencimiento_med = $_POST['fecha_vencimiento'];
    $cantidad_med = $_POST['cantidad'];
    $registro_invima_med = $_POST['registro_invima'];


    if( $nombre_med === '' ) {
        $errores[] = 'El nombre no puede ir vacio';
    }

    if( $lote_med === '' ) {
        $errores[] = 'El lote no puede ir vacio';
    }

    if( $fecha_vencimiento_med === '' ) {
        $errores[] = 'La fecha de vencimiento no puede ir vacia';
    }

    if( $cantidad_med === '' ) {
        $errores[] = 'La cantidad no puede ir vacia';
    }

    if( $registro_invima_med === '' ) {
        $errores[] = 'El registro invima no puede ir vacio';
    }

    if( empty($errores) ) {

        $query = "INSERT INTO `medicamentos`( `nombre`, `lote`, `fecha_vencimiento`, `cantidad`, `registro_invima`, `id_ambulancia`) VALUES ('$nombre_med','$lote_med','$fecha_vencimiento_med','$cantidad_med','$registro_invima_med','$id_ambulancia')";

        $respuesta_consulta = mysqli_query($conexion, $query);

    }



}


?>

<section class="contenedor med">

<a href="./medicamentos.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
    <img src="<?php echo $carpeta_imagen . 'volver.png';?>" alt="img volver">
</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form action="" method="POST" class="formulario">

        <label for="nombre">Nombre</label>
        <select name="nombre" id="nombre">
            <option value="" selected> -- Seleccione una opcion -- </option>
            <?php foreach( $result_med as $r ): ?>
            <option value="<?php echo $r['nombre'] ?>"><?php echo $r['nombre']; ?></option>
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