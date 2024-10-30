<?php
$host = 'localhost';
$dbname = 'u328800997_Dmondejarm';
$user = 'u328800997_rootDmondejarm';
$pass = 'F5^Z#rU1u&h';

$conexion = new mysqli($host, $user, $pass, $dbname);
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}
