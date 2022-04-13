<?php 


$_SESSION['admin'];

include('includes/header.php');

if($_SESSION['admin']) {
    header('location: view/admin.php');
}else {
    header('location: view/inicio.php');
}
?>









