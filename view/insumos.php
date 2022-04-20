<?php

include('../includes/header.php');

if (!isset($_SESSION['user'])) {
    header('location: ../index.php');
}

?>









<?php include('../includes/footer.php'); ?>