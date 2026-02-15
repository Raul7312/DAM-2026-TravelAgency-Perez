<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../clases/conexionBd.php';
include 'seguridad.php';

$id = $_GET['id'];

try {
        $sql = "DELETE FROM viajes WHERE id_viaje = ?";
        $stmt = $connBd->prepare($sql);
        $stmt->execute([$id]);

        header("Location: ../admin/administrar_viajes.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
   