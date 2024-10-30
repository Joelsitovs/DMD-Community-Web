<?php
include 'conexion.php';

$consulta = "SELECT nombre, fecha_inicio, Premio, Precio_inscripcion, imagen FROM torneos Limit 1";
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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="card-wrapper">
            <ul class="card-list">
                <?php foreach ($torneos as $row) { ?>
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="<?php echo htmlspecialchars($row['imagen']);?> " alt="" class="card-image">
                        <h2 class="card-title"><?php echo htmlspecialchars($row['nombre']);  ?></h2>
                        <p class="card-text">Fecha de inicio: 12/12/2020</p>
                        <p class="card-text">Premio</p>
                        <p class="card-text">Precio de inscripción: $100</p>
                        <button class="card-button
                        material-symbols-outlined"> arrow_forward</button>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>

</body>

</html>