<?php
$host = 'localhost';
$dbname = 'u328800997_BdDmon';
$user = 'u328800997_root3';
$pass = 'asyf7F9ckp7&hET';

$conexion = new mysqli($host, $user, $pass, $dbname);
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}
