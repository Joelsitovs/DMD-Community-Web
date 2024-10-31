<?php
$host ="193.203.168.81";
$dbname ="u328800997_DBroot_root";
$user ="u328800997_root_root";
$pass ="MJ~X2f6N^s";
$conexion = new mysqli($host, $user, $pass, $dbname);
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}else{
    echo "Conexión exitosa";
}