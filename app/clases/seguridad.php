<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["acceso"]) || $_SESSION["acceso"] !== true) {
    header("location: ../admin/login.php");
    exit;
}
?>