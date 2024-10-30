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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="container">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
                <?php foreach ($torneos as $row) { ?>
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                        <img src="<?php echo ($row['imagen']);?> " alt="" class="card-image">
                        <h2 class="card-title"><?php echo ($row['nombre']);  ?></h2>
                        <p class="card-text">Fecha de inicio: <?php echo ($row['fecha_inicio']);?></p>
                        <p class="card-text">Premio: <?php echo ($row['Premio']);?></p>
                        <p class="card-text">Precio de inscripción: $<?php echo ($row['Precio_inscripcion']);?></p>
                        <button class="card-button
                        material-symbols-outlined"> arrow_forward</button>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src"scripts.js"></script>
</body>

</html>