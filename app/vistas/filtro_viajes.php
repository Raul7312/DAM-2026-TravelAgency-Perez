<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'destacados';

if ($filtro == 'todos') {
    $sql = "SELECT * FROM viajes";
} elseif ($filtro == 'destacados') {
    $sql = "SELECT * FROM viajes WHERE destacado = 1";
} else {
    $sql = "SELECT * FROM viajes WHERE tipo_viaje = :tipo";
}

$stmt = $connBd->prepare($sql);

if ($filtro != 'todos' && $filtro != 'destacados') {
    $stmt->bindParam(':tipo', $filtro);
}

$stmt->execute();
if ($stmt->rowCount() > 0) {

    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $fechaInicio = new DateTime($fila['fecha_inicio']);
        $fechaFin = new DateTime($fila['fecha_fin']);
        $diferencia = $fechaInicio->diff($fechaFin);
        $dias = $diferencia->days;
        $fechaBonita = $fechaInicio->format('d M') . " - " . $fechaFin->format('d M');
        ?>

        <article class="card">
            <div class="imagen-card">
                <img src="../assets/img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">
            </div>

            <div class="contenido">
                <p class="tipo-viaje"><?php echo $fila['tipo_viaje']; ?></p>

                <h3><?php echo $fila['titulo']; ?></h3>

                <div class="datos">
                    <p><?php echo $fechaBonita; ?></p>
                    <p><?php echo $dias; ?> días</p>
                </div>

                <div class="footer-card">
                    <div class="precios">
                        <p class="precio-grande"><?php echo $fila['precio']; ?>€</p>
                        <p class="precio-chico"><?php echo $fila['presupuesto'] ?>€</p>
                    </div>
                    <a href="../public/ver_viaje.php?id=<?php echo $fila['id_viaje']; ?>" class="boton">Ver Viaje</a>
                </div>
            </div>
        </article>

        <?php
    }
} else {
    ?>
    <div>
        <h3>Vaya, no hemos encontrado viajes de "<?php echo $filtro; ?>"</h3>
        <p>En este momento no tenemos aventuras disponibles en esta categoría</p>
        <a href="index.php">Ver todos los viajes</a>
    </div>
    <?php
}
?>