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
    <title>Torneos</title>
    
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container ">
        <div class="card-wrapper">
            <ul class="card-list">
                <?php foreach ($torneos as $row) { ?>
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="<?php echo $row['imagen']; ?>" alt="Card Image" class="card-image">
                        <h2 class="card-title"><?php echo $row['nombre']; ?></h2>
                        <p class="card-text">Fecha de inicio: <?php echo $row['fecha_inicio']; ?></p>
                        <p class="card-text">Premio: <?php echo $row['Premio']; ?></p>
                        <p class="card-text">Precio de inscripción: $<?php echo $row['Precio_inscripcion']; ?></p>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <?php } ?>
            </ul>
      
        </div>
    </div>

</body>

</html>
