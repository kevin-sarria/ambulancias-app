<?php

session_start();

include('../includes/header.php');
include('../model/conexion.php');
include('../model/rutas.php');

if (!isset($_SESSION['login'])) {
    header('location: /ambulancias-app/');
}

// Iniciamos la conexion para hacer la posterior consulta
$conexion = conectarDB();

// Obtenemos el id de la ambulancia mediante la URL
$id_ambulancia = $_GET['id'];

// Escribimos la consulta para luego usarla y traer los datos basicos de la ambulancia
$query = "SELECT placa, imagen, nombre FROM ambulancia A JOIN tipo_ambulancia TA ON A.id_tipo_ambulancia = TA.id WHERE A.id = $id_ambulancia";

$resultado = mysqli_query($conexion, $query);

mysqli_fetch_assoc($resultado);

// Escribimos una segunda consulta para traer los datos de los medicametos que tiene la ambulancia
$query_med = "SELECT * FROM medicamentos WHERE id_ambulancia='$id_ambulancia'";

$result_med = mysqli_query($conexion, $query_med);

mysqli_fetch_assoc($result_med);

// Escribimos una tercera consulta para traer los datos de los dispositivos medicos que tiene la ambulancia
$query_disp = "SELECT * FROM dispositivos_medicos WHERE id_ambulancia='$id_ambulancia'";

$result_disp = mysqli_query($conexion, $query_disp);

mysqli_fetch_assoc($result_disp);


?>



<section class="ver__ambulancia"> <!-- Inicio sección ver anbulancia -->
    <a class="boton__volver" href="/ambulancias-app/view/ambulancias.php"><img src="/ambulancias-app/img/volver.png" alt="Icono Vovler Atrás"></a><!-- boton de volver atras -->

    <?php foreach( $resultado as $r ): ?>
    <div class="contenedor__ver__ambulancia"><!-- Inicio del contenedor de ver ambulancias -->

        <div class="img__ver__ambulancia"><!-- Inicio del contenedor de la imagen -->
            <h3>Ambulancia Medicalizada</h3>
            <img src="<?php echo $r['imagen']; ?>" alt="Foto Ambulancia">
            <a href="<?php echo "./insumos.php?id=" . $id_ambulancia; ?>" class="btn__opciones__ambulancia">Ver Insumos</a>
            <a href="<?php echo $carpeta_vistas . 'carpetas.php?id=' . $id_ambulancia; ?>" class="btn__opciones__ambulancia">Ver Documentos</a>
            <a href="<?php echo $carpeta_vistas . 'links_aseo.php?id=' . $id_ambulancia; ?>" class="btn__opciones__ambulancia">Links de aseo</a>
            <a href="<?php echo $carpeta_vistas . 'links_kilometraje.php?id=' . $id_ambulancia; ?>" class="btn__opciones__ambulancia">Links Kilometraje</a>
        </div> <!-- Fin del contenedor de la imagen -->

        <div class="texto__ver__ambulancia"><!-- Inicio de toda la informacion de la ambulancia -->
            <div class="datos__ambulancia">
                <div class="placa"><!-- Inicio del contenedor de las placas de la ambulancia -->
                    <h4>Placa</h4>
                    <input type="text" value="<?php echo $r['placa']; ?>" disabled>
                </div><!-- Fin del contenedor de las placas de la ambulancia -->


                <div class="tipo__ambulancia"> <!-- Inicio del contenedor del tipo de ambulancia  -->
                    <h4>Tipo Ambulancia</h4>
                    <input type="text" value="<?php echo $r['nombre']; ?>" disabled>
                </div><!-- Fin del contenedor del tipo de ambulancia -->

            </div>

            <?php endforeach; ?>

            <div class="datos__insumos"> <!-- Inicio del contenedor de los datos de los insumos -->
                <h3>Insumos</h3>
                <div class="info__divs__insumos"> <!-- Inicio del contenedor que contiene los medicamentos de la ambulancia -->
                    <div class="medicamentos__ambulancia">
                        <h4>Medicamentos</h4>

                        <?php
                        
                        if( $result_med->num_rows ):

                        foreach($result_med as $result): ?>
                        
                        <p> x <?php echo $result['cantidad'];?> <?php echo $result['nombre']; ?> </p>

                        <?php 
                    
                            endforeach;
                            
                        else:
                            echo '<p class="neutro">Por favor, Registra información</p>';

                        endif;
                        ?>



                    </div> <!-- Fin del contenedor que contiene los medicamentos de la ambulancia -->

                    <div class="dispositivos__medicos__ambulancia"> <!-- Inicio del contenedor que contiene los dispositivos medicos de la ambulancia -->
                        <h4>Dispositivos Medicos</h4>

                        <?php
                        
                        if( $result_disp->num_rows ):
                        
                        foreach( $result_disp as $disp_med  ): ?>

                        <p>x<?php echo $disp_med['cantidad']; ?> <?php echo $disp_med['nombre']; ?></p>

                        <?php 
                    
                            endforeach;
                            
                        else:
                            echo '<p class="neutro">Por favor, Registra información</p>';

                        endif;
                        ?>

                    </div> <!-- Fin del contenedor que contiene los dispositivos medicos de la ambulancia -->
                </div>
                <div class="botones botones__ambulancia">
                   
                    <a class='btn_amarillo' href='#'>Editar</a>
                   
                   <?php 
                        if($_SESSION['user'] == 1) { 
                            echo "<a class='btn_rojo' href='#'>Eliminar</a>";
                        }
                    ?>

                </div>
                
            </div> <!-- Fin del contenedor de los datos de los insumos -->
        </div> <!-- Fin del contenedor de toda la informacion de la ambulancia -->

    </div><!-- Fin del contenedor de ver ambulancias -->

</section>








<?php include('../includes/footer.php'); ?>