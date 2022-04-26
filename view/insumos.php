<?php

session_start();

include('../includes/header.php');

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

?>









<?php include('../includes/footer.php'); ?>