<?php
include 'conexion.php';

$consulta = "SELECT nombre, fecha_inicio, Premio, Precio_inscripcion, imagen FROM torneos";
$resultado = $conexion->query($consulta);

$torneos = [];
while ($row = $resultado->fetch_assoc()) {
    $torneos[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward" />
    <link rel="stylesheet" href="scripts.js">
</head>

<body>
    <div class="container">
        <div class="card-wrapper">
            <ul class="card list">
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="" alt="" class="">
                        <p class="badge">Torneo</p>
                        <h2 class="card-title">Torneo de Fortnite</h2>
                        <p class="card-text">Fecha de inicio: 12/12/2020</p>
                        <span class="material-symbols-outlined">
                            arrow_forward
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</body>

</html>