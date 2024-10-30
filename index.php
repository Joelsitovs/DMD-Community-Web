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
	<title>Carousel / Slider con Glider.js</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="contenedor">
		<div class="carousel">
			<div class="carousel__contenedor">
				<button aria-label="Anterior" class="carousel__anterior">
					<i class="fas fa-chevron-left"></i>
				</button>

				<div class="carousel__lista">
                    <?php foreach ($torneos as $row) ?>
                    <div class="carousel__elemento">
                        <img src="<?php echo $row['imagen'] ?>" alt="Imagen de torneo" class="carousel__imagen">
                        <div class="carousel__informacion">
                            <h3 class="carousel__titulo"><?php echo $row['nombre'] ?></h3>
                            <p class="carousel__descripcion">
                                <span class="carousel__fecha">Fecha de inicio: <?php echo $row['fecha_inicio'] ?></span>
                                <span class="carousel__premio">Premio: <?php echo $row['Premio'] ?></span>
                                <span class="carousel__precio">Precio de inscripción: <?php echo $row['Precio_inscripcion'] ?></span>
                            </p>
						
				</div>

				<button aria-label="Siguiente" class="carousel__siguiente">
					<i class="fas fa-chevron-right"></i>
				</button>
			</div>

			<div role="tablist" class="carousel__indicadores"></div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="scripts.js"></script>
</body>
</html>