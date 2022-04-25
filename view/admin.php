<?php

include('../includes/header.php');

if (!isset($_SESSION['login'])) {
    header('location: ../index.php');
}


?>

    <section class="inicio__admin">
        <div class="contenedor__inicio__admin">
            <h2>Insumos proximos a vencer</h2>

            <table class="tabla_inicio_admin">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Registro Invima</td>
                        <td>Lote</td>
                        <td>Fecha Vencimiento</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th data-label = "Nombre" >Aceptaminofen</th>
                        <th data-label = "Registro invima" >INVIMA 2022M-0020337</th>
                        <th data-label = "Lote"  class="fecha_lote">8/12/2020</th>
                        <th data-label = "Fecha Vencimiento"  class="fecha_vencimiento">8/10/2022</th>
                    </tr>

                    <tr>
                        <th data-label = "Nombre" >Aceptaminofen</th>
                        <th data-label = "Registro Invima" >INVIMA 2022M-0020337</th>
                        <th data-label = "Lote"  class="fecha_lote">8/12/2020</th>
                        <th data-label = "Fecha Vencimiento"  class="fecha_vencimiento">8/10/2022</th>
                    </tr>

                    <tr>
                        <th data-label = "Nombre" >Aceptaminofen</th>
                        <th data-label = "Registro Invima" >INVIMA 2022M-0020337</th>
                        <th data-label = "Lote"  class="fecha_lote">8/12/2020</th>
                        <th data-label = "Fecha Vencimiento"  class="fecha_vencimiento">8/12/2022</th>
                    </tr>

                </tbody>
            </table>

        </div>
    </section>

<script src = "../js/inicio_admin.js" type="module"></script>

<?php include('../includes/footer.php'); ?>