<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../clases/conexionBd.php';

try {
    $id = $_POST['id_viaje'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo_viaje'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $precio = $_POST['precio'];
    $presupuesto = $_POST['presupuesto'];
    $plazas = $_POST['plazas'];
    $destacado = $_POST['destacado'];
   

    $imagen_subir = $_POST['imagen_actual'];

    if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['name'])) {

        $imagen_nombre = $_FILES['imagen']['name'];
        $target_image = $_FILES['imagen']['tmp_name'];
        $ruta_destino = '../assets/img/' . $imagen_nombre;
        if (move_uploaded_file($target_image, $ruta_destino)) {
            $imagen_subir = $imagen_nombre;
        }
    }

    $sql = "UPDATE viajes SET 
                    titulo = :titulo, 
                    descripcion = :descripcion,
                    tipo_viaje = :tipo, 
                    fecha_inicio = :inicio, 
                    fecha_fin = :fin, 
                    precio = :precio, 
                    presupuesto = :presupuesto,
                    plazas = :plazas,
                    destacado = :destacado,
                    imagen = :imagen
                    WHERE id_viaje = :id";

    $stmt = $connBd->prepare($sql);

    $stmt->execute([
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':tipo' => $tipo,
        ':inicio' => $fecha_inicio,
        ':fin' => $fecha_fin,
        ':precio' => $precio,
        ':presupuesto' => $presupuesto,
        ':plazas' => $plazas,
        ':destacado' => $destacado,
        ':imagen' => $imagen_subir,
        ':id' => $id,
    ]);

    header("Location: ../admin/administrar_viajes.php");
    exit;
} catch (PDOException $e) {
    echo "Error al guardar: " . $e->getMessage();
}
?>