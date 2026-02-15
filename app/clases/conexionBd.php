<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$servername = "localhost";
$username = "root";
$password = "";

try{
    $connBd = new PDO("mysql:host=$servername;dbname=sistemasfinal", $username, $password);
    $connBd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
