<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../vistas/cabecera.php';
include '../clases/conexionBd.php';
include '../clases/seguridad.php';

$sql = 'SELECT * FROM viajes';
$stmt = $connBd->query($sql);

echo "<div class='admin-cab'>";
echo "<h1>Gestión de Viajes</h1>";

echo "<a href='../admin/add_viaje.php' class='btn-nuevo'>+ Nuevo Viaje</a>";
echo "</div>";

echo "<table class='tabla-viajes'>";

echo "<thead>";
echo "<tr>
                <th>ID</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Precio</th>
                <th>Presupuesto</th>
                <th>Plazas</th>
                <th>Destacado</th>
                <th>Acciones</th>
              </tr>";
echo "</thead>";

echo "<tbody>";

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";

    echo "<td>" . $fila['id_viaje'] . "</td>";
    echo "<td>" . $fila['titulo'] . "</td>";
    echo "<td>" . $fila['tipo_viaje'] . "</td>";
    echo "<td>" . $fila['fecha_inicio'] . "</td>";
    echo "<td>" . $fila['fecha_fin'] . "</td>";
    echo "<td>" . $fila['precio'] . "€</td>";
    echo "<td>" . $fila['presupuesto'] . "</td>";
    echo "<td>" . $fila['plazas'] . "</td>";
    echo "<td>" . ($fila['destacado'] == 1 ? 'Sí' : 'No') . "</td>";

    echo "<td>";
    echo "<a href='../admin/editar.php?id=" . $fila['id_viaje'] . "' class='btn-editar'>Modificar</a>";

    echo "<a href='../clases/borrar_viaje.php?id=" . $fila['id_viaje'] . "' 
                  class='btn-eliminar'
                  onclick='return confirm(\"¿Estás seguro de que quieres borrar este viaje?\")'>
                  Eliminar
                  </a>";
    echo "</td>";

    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>
</body>
</html>