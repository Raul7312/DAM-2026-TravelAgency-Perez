<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../clases/conexionBd.php';
include '../vistas/cabecera.php';
?>

<div class="contenedor-body">

    <h1>Bienvenido a Green Trip</h1>

    <img src="../assets/img/miniLogo.png" alt="Segundo logo" style="width: 100px;"/>
    <p>Viajes de aventura en grupo para descubrir el mundo de una forma diferente, flexible y sostenible</p>
</div>

<section>

    <div class='admin-cab' ">
        <h1>Nuestros viajes</h1>

        <form method="GET" action="index.php">
            <select name="filtro" onchange="this.form.submit()" style="padding: 5px; font-size: 16px;">

                <option value="destacados" <?php if (!isset($_GET['filtro']) || $_GET['filtro'] == 'destacados') echo 'selected'; ?>>
                    Ver destacados
                </option>

                <option value="todos" <?php if (isset($_GET['filtro']) && $_GET['filtro'] == 'todos') echo 'selected'; ?>>
                    Ver todos
                </option>

                <option value="Playa" <?php if (isset($_GET['filtro']) && $_GET['filtro'] == 'Playa') echo 'selected'; ?>>
                    Playa
                </option>

                <option value="Montaña" <?php if (isset($_GET['filtro']) && $_GET['filtro'] == 'Montaña') echo 'selected'; ?>>
                    Montaña
                </option>

                <option value="Ciudad" <?php if (isset($_GET['filtro']) && $_GET['filtro'] == 'Ciudad') echo 'selected'; ?>>
                    Ciudad
                </option>

                <option value="Crucero" <?php if (isset($_GET['filtro']) && $_GET['filtro'] == 'Crucero') echo 'selected'; ?>>
                    Crucero
                </option>
            </select>
        </form>
    </div>
    <div class="contenedor-viajes">

        <?php include '../vistas/filtro_viajes.php'; ?>

    </div>
</section>

<?php include '../vistas/footer.php'; ?> 
