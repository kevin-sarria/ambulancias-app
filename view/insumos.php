<?php

session_start();

include('../includes/header.php');

if (!isset($_SESSION['login'])) {
    header('location: ../index.php');
}

?>









<?php include('../includes/footer.php'); ?>