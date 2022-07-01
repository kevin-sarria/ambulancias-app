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
$id_link_aseo = $_GET['id-link-aseo'];


?>








<?php
include('../includes/footer.php');
?>