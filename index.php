<?php
include 'conexion.php';

$consulta = "SELECT nombre, fecha_inicio, Premio, Precio_inscripcion, imagen FROM torneos LIMIT 1";
$resultado = $conexion->query($consulta);

$torneos = [];
if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        $torneos[] = $row;
    }
} else {
    echo "Error en la consulta: " . $conexion->error; // Manejo de errores
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward" />
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="container">
        <div class="card-wrapper">
            <ul class="card-list">
                <?php if (!empty($torneos)): ?>
                    <?php foreach ($torneos as $row): ?>
                        <li class="card-item">
                            <a href="#" class="card-link">
                                <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" class="card-image">
                                <h2 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h2>
                                <p class="card-text">Fecha de inicio: <?php echo htmlspecialchars($row['fecha_inicio']); ?></p>
                                <p class="card-text">Premio: <?php echo htmlspecialchars($row['Premio']); ?></p>
                                <p class="card-text">Precio de inscripción: $<?php echo htmlspecialchars($row['Precio_inscripcion']); ?></p>
                                <button class="card-button material-symbols-outlined">arrow_forward</button>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="card-item">No se encontraron torneos.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</body>

</html>
