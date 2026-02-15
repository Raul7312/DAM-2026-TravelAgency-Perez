<?php
/* ... tus includes y consultas PHP se quedan igual ... */
include '../clases/conexionBd.php';
include '../vistas/cabecera.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM viajes WHERE id_viaje=?';
$stmt = $connBd->prepare($sql);
$stmt->execute([$id]);
$fila = $stmt->fetch(PDO::FETCH_ASSOC);

$fechaInicio = new DateTime($fila['fecha_inicio']);
$fechaFin = new DateTime($fila['fecha_fin']);
$diferencia = $fechaInicio->diff($fechaFin);
$dias = $diferencia->days;
?>

<div class='admin-cab'>
    <h1><?php echo $fila['titulo'] ?></h1>
</div>

<div class="contenedor-viaje-detalle">
    
    <div class="imagen-esp">
        <img src="../assets/img/<?php echo $fila['imagen']; ?>" alt="Imagen viaje">
    </div>

    <div class="contenido-detalle">
        
        <h3 class="subtitulo-detalle">Descripción del viaje</h3>
        <p class="texto-descripcion"><?php echo $fila['descripcion'] ?></p>

        <div class="datos-grid">
            <div class="dato-item">
                <span class="etiqueta">Salida:</span>
                <span class="valor"><?php echo $fechaInicio->format('d/m/Y'); ?></span>
            </div>
            <div class="dato-item">
                <span class="etiqueta">Regreso:</span>
                <span class="valor"><?php echo $fechaFin->format('d/m/Y'); ?></span>
            </div>
            <div class="dato-item">
                <span class="etiqueta">Duración:</span>
                <span class="valor"><?php echo $dias; ?> días</span>
            </div>
            <div class="dato-item">
                <span class="etiqueta">Plazas:</span>
                <span class="valor"><?php echo $fila['plazas']; ?> disponibles</span>
            </div>
        </div>

        <div class="bloque-precio">
            <span class="precio-grande"><?php echo $fila['precio']; ?>€</span>
            <small class="presupuesto-info">Presupuesto base: <?php echo $fila['presupuesto'] ?>€</small>
        </div>
        
        <div class="acciones-detalle">
            <a href="../public/index.php" class="btn-volver">← Volver al listado</a>
        </div>

    </div>
</div>

<?php include '../vistas/footer.php'; ?>



