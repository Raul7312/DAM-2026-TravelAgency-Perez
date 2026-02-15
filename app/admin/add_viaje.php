<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../vistas/cabecera.php';
?>


<form action="../clases/insertar_viaje.php" method="POST" enctype="multipart/form-data" class="formulario">

    <h2 class="titulo-form">Añadir Nuevo Viaje</h2>

    <div class="campo">
        <label>Título:</label>
        <input type="text" name="titulo" required>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Tipo:</label>
            <select name="tipo_viaje">
                <option value="Playa">Playa</option>
                <option value="Montaña">Montaña</option>
                <option value="Ciudad">Ciudad</option>
                <option value="Crucero">Crucero</option>
            </select>
        </div>
        <div class="campo">
            <label>¿Destacado en portada?:</label>
            <select name="destacado">
                <option value="0" selected>No</option>
                <option value="1">Sí</option>
            </select>
        </div>
    </div>

    <div class="campo">
        <label>Descripción:</label>
        <textarea name="descripcion" rows="4" required></textarea>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" required>
        </div>
        <div class="campo">
            <label>Fecha Fin:</label>
            <input type="date" name="fecha_fin" required>
        </div>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" min="0" required>
        </div>
        <div class="campo">
            <label>Presupuesto Base:</label>
            <input type="number" name="presupuesto" step="0.01" min="0" required>
        </div>
    </div>

    <div class="fila">
        <div class="campo">
            <label>Plazas:</label>
            <input type="number" name="plazas" min="1" required>
        </div>
        <div class="campo">
            <label>Imagen del viaje:</label>
            <input type="file" name="imagen" accept="image/*" required>
        </div>
    </div>

    <div class="botones-accion">
        <input type="submit" value="Añadir Viaje" class="btn-guardar">
        <a href="../admin/administrar_viajes.php" class="btn-cancelar">Cancelar</a>
    </div>

</form>