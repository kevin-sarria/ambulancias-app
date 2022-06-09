<?php

session_start();


include('../includes/header.php');

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}


?>



<section class="ver__ambulancia"> <!-- Inicio sección ver anbulancia -->
    <a class="boton__volver" href="/ambulancias-app/view/ambulancias.php"><img src="/ambulancias-app/img/volver.png" alt="Icono Vovler Atrás"></a><!-- boton de volver atras -->

    <div class="contenedor__ver__ambulancia"><!-- Inicio del contenedor de ver ambulancias -->

        <div class="img__ver__ambulancia"><!-- Inicio del contenedor de la imagen -->
            <h3>Ambulancia Medicalizada</h3>
            <img src="../img/am1.jpg" alt="Foto Ambulancia">
        </div> <!-- Fin del contenedor de la imagen -->

        <div class="texto__ver__ambulancia"><!-- Inicio de toda la informacion de la ambulancia -->
            <div class="datos__ambulancia">
                <div class="placa"><!-- Inicio del contenedor de las placas de la ambulancia -->
                    <h4>Placa</h4>
                    <input type="text" value="A32-02M" disabled>
                </div><!-- Fin del contenedor de las placas de la ambulancia -->


                <div class="tipo__ambulancia"> <!-- Inicio del contenedor del tipo de ambulancia  -->
                    <h4>Tipo Ambulancia</h4>
                    <input type="text" value="Medicalizada" disabled>
                </div><!-- Fin del contenedor del tipo de ambulancia -->

            </div>

            <div class="datos__insumos"> <!-- Inicio del contenedor de los datos de los insumos -->
                <h3>Insumos</h3>
                <div class="info__divs__insumos"> <!-- Inicio del contenedor que contiene los medicamentos de la ambulancia -->
                    <div class="medicamentos__ambulancia">
                        <h4>Medicamentos</h4>
                        <p>x30 Pastillas Aceptaminofen</p>
                        <p>x30 Pastillas Aceptaminofen</p>
                        <p>x30 Pastillas Aceptaminofen</p>
                    </div> <!-- Fin del contenedor que contiene los medicamentos de la ambulancia -->

                    <div class="dispositivos__medicos__ambulancia"> <!-- Inicio del contenedor que contiene los dispositivos medicos de la ambulancia -->
                        <h4>Dispositivos Medicos</h4>
                        <p>x20 Jeringas 5mm</p>
                        <p>x20 Jeringas 5mm</p>
                        <p>x20 Jeringas 5mm</p>
                    </div> <!-- Fin del contenedor que contiene los dispositivos medicos de la ambulancia -->
                </div>
                <div class="botones__ambulancia">
                   
                    <a class='editar__ambulancia' href='#'>Editar</a>
                   
                   <?php 
                        if($_SESSION['user'] == 1) { 
                            echo "<a class='eliminar__ambulancia' href='#'>Eliminar</a>";
                        }
                    ?>

                </div>
                
            </div> <!-- Fin del contenedor de los datos de los insumos -->
        </div> <!-- Fin del contenedor de toda la informacion de la ambulancia -->

    </div><!-- Fin del contenedor de ver ambulancias -->

</section>








<?php include('../includes/footer.php'); ?>