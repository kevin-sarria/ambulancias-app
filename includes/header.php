<?php
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
    <link rel="stylesheet" href="/ambulancias-app/css/normalize.css">
    <link rel="stylesheet" href="/ambulancias-app/css/estilo.css">
    <title>Ambulancias app</title>
</head>

<body>

    <header class="header">

        <div class="header__barra">
            <div class="logo">
                <a href="#"><img src="/ambulancias-app/img/logo.png" alt="Logo Ambulancia"></a>
            </div>

            <nav class="navegacion">
                <?php if (!isset($_SESSION['user'])) {
                    echo '<a href="#">Iniciar Sesión</a>';
                } ?>
                <?php if (isset($_SESSION['user'])) {
                    echo '<a href="/ambulancias-app/view/admin.php">Inicio</a>';
                    echo '<a href="/ambulancias-app/view/ambulancias.php">Ambulancias</a>';
                    echo '<a href="../cerrar_sesion.php">Cerrar Sesión</a>';
                } ?>
                
            </nav>

            <img class="icono_menu" src="/ambulancias-app/img/menu.png" alt="Icono menu">
            

        </div>

    </header>


    <main class="contenedor contenido-principal">