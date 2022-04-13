<?php
    $h = 2;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fuentes de Letras -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@400;700&display=swap" rel="stylesheet">
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Ambulancias app</title>
</head>
<body>

    <header  class="header">

    <div class="header__barra">
        <div class="logo">
            <a href="#"><img src="../img/logo.png" alt="Logo Ambulancia"></a>
        </div>

        <nav class="navegacion">
        <?php if($h === 2) {echo '<a href="#">Iniciar Sesión</a>';} ?>
            <?php if($h === 1) {echo '<a href="#">Inicio</a>';} ?>
            <?php if($h === 1) {echo '<a href="#">Ambulancias</a>';} ?>
            <?php if($h === 1) {echo '<a href="#">Insumos</a>';} ?>
            <?php if($h === 1) {echo '<a href="#">Cerrar Sesión</a>';} ?>
        </nav>
        </div>
    </header>


    <main class="contenedor contenido-principal">
        
    

    
