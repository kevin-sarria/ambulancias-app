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

$query_med = "SELECT * FROM medicamentos";

$result_med = mysqli_query($conexion, $query_med);

mysqli_fetch_assoc($result_med)


?>

<section class="contenedor">

<a href="./medicamentos.php?id=<?php echo $id_ambulancia; ?>" class="boton__volver">
    <img src="<?php echo $carpeta_imagen . 'volver.png';?>" alt="img volver">
</a>

    <form action="" method="POST" class="formulario">

        <label for="name">Nombre</label>
        <select name="name" id="name">
            <option disabled selected> -- Seleccione una opcion -- </option>
            <?php foreach( $result_med as $r ): ?>
            <option value="<?php echo $r['id'] ?>"><?php echo $r['nombre']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="tipo_medicamento">Tipo Medicamento</label>
        <select name="tipo_medicamento" id="tipo_medicamento">
            <option disabled selected> -- Seleccione una opcion -- </option>
            <option value="1">Aceptaminofen</option>
            <option value="2">Paracetamol</option>
            <option value="3">Tramadol</option>
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