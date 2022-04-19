<?php

include('../includes/header.php');



if (!isset($_SESSION['user'])) {
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
                        <th>Aceptaminofen</th>
                        <th>INVIMA 2022M-0020337</th>
                        <th>08/12/2020</th>
                        <th class="fecha_vencimiento">08/10/2022</th>
                    </tr>

                    <tr>
                        <th>Aceptaminofen</th>
                        <th>INVIMA 2022M-0020337</th>
                        <th>08/12/2020</th>
                        <th class="fecha_vencimiento">08/10/2022</th>
                    </tr>

                    <tr>
                        <th>Aceptaminofen</th>
                        <th>INVIMA 2022M-0020337</th>
                        <th>08/12/2020</th>
                        <th class="fecha_vencimiento">08/12/2022</th>
                    </tr>

                </tbody>
            </table>

        </div>
    </section>

<script src = "../js/inicio_admin.js"></script>

<?php include('../includes/footer.php'); ?>