<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include'../clases/conexionBd.php';

try {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo_viaje'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $precio = $_POST['precio'];
    $presupuesto = $_POST['presupuesto'];
    $plazas = $_POST['plazas'];
    $destacado = $_POST['destacado'];

    $imagen_nombre = $_FILES['imagen']['name'];
    $target_image = $_FILES['imagen']['tmp_name'];

    $ruta_image = '../assets/img/' . $imagen_nombre;

    move_uploaded_file($target_image, $ruta_image);

    $sql = "INSERT INTO viajes (titulo, descripcion, tipo_viaje, fecha_inicio, fecha_fin, precio, presupuesto, plazas, destacado, imagen) 
                VALUES (:titulo, :descripcion, :tipo, :fecha_inicio, :fecha_fin, :precio, :presupuesto, :plazas, :destacado, :imagen)";

    $stmt = $connBd->prepare($sql);

    $stmt->execute([
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':tipo' => $tipo,
        ':fecha_inicio' => $fecha_inicio,
        ':fecha_fin' => $fecha_fin,
        ':precio' => $precio,
        ':presupuesto' => $presupuesto,
        ':plazas' => $plazas,
        ':destacado' => $destacado,
        ':imagen' => $imagen_nombre
    ]);

    header('Location: ../admin/administrar_viajes.php');
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>