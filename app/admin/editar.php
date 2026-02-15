<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../clases/conexionBd.php';
include '../vistas/cabecera.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM viajes WHERE id_viaje=?';

$stmt = $connBd->prepare($sql);
$stmt->execute([$id]);

$fila = $stmt->fetch(PDO::FETCH_ASSOC);
?>



<form action="../clases/actualizar_viaje.php" method="POST" enctype="multipart/form-data" class="formulario">

    <h2 class="titulo-form">Modificar Viaje: <?php echo $fila['titulo']; ?></h2>

    <input type="hidden" name="id_viaje" value="<?php echo $fila['id_viaje']; ?>">

    <div class="campo">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo $fila['titulo']; ?>" required>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Tipo:</label>
            <select name="tipo_viaje">
                <option value="Playa"   <?php if ($fila['tipo_viaje'] == 'Playa') echo 'selected'; ?>>Playa</option>
                <option value="Montaña" <?php if ($fila['tipo_viaje'] == 'Montaña') echo 'selected'; ?>>Montaña</option>
                <option value="Ciudad"  <?php if ($fila['tipo_viaje'] == 'Ciudad') echo 'selected'; ?>>Ciudad</option>
                <option value="Crucero" <?php if ($fila['tipo_viaje'] == 'Crucero') echo 'selected'; ?>>Crucero</option>
            </select>
        </div>

        <div class="campo">
            <label>¿Destacado en portada?</label>
            <select name="destacado">
                <option value="0" <?php if ($fila['destacado'] == 0) echo 'selected'; ?>>No</option>
                <option value="1" <?php if ($fila['destacado'] == 1) echo 'selected'; ?>>Sí</option>
            </select>
        </div>
    </div>

    <div class="campo">
        <label>Descripción:</label>
        <textarea name="descripcion" rows="4" required><?php echo $fila['descripcion']; ?></textarea>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" value="<?php echo $fila['fecha_inicio']; ?>" required>
        </div>
        <div class="campo">
            <label>Fecha Fin:</label>
            <input type="date" name="fecha_fin" value="<?php echo $fila['fecha_fin']; ?>" required>
        </div>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Precio (€):</label>
            <input type="number" name="precio" step="0.01" min="0" value="<?php echo $fila['precio']; ?>" required>
        </div>
        <div class="campo">
            <label>Presupuesto Base (€):</label>
            <input type="number" name="presupuesto" step="0.01" min="0" value="<?php echo $fila['presupuesto']; ?>" required>
        </div>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Plazas:</label>
            <input type="number" name="plazas" min="1" value="<?php echo $fila['plazas']; ?>" required>
        </div>

        <div class="campo">
            <label>Cambiar imagen:</label>
            <input type="file" name="imagen" accept="image/*">
            <input type="hidden" name="imagen_actual" value="<?php echo $fila['imagen']; ?>">
            <small >
                La imagen anterior: <strong><?php
                    if ($fila['imagen']) {
                        echo "{$fila['imagen']}";
                    } else {
                        echo "Introduzca una imagen";
                    }
                    ?></strong>
            </small>
        </div>
    </div>

    <div class="botones-accion">
        <input type="submit" value="Guardar Cambios" class="btn-guardar">
        <a href="../admin/administrar_viajes.php" class="btn-cancelar">Cancelar</a>
    </div>

</form>