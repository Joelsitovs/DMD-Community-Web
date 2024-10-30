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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMD Community</title>
    <!-- Glide.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.theme.min.css">
    <!-- Glide.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <!-- Encabezado -->
    <header class="header">
        <div class="header-content">
            <h1>¡Bienvenidos a DMD Community!</h1>
            <p>Compite en torneos de tus juegos favoritos</p>
        </div>
    </header>

    <!-- Navegación -->
    <nav class="navbar">
        <ul class="nav-menu">
            <li><a href="#torneos">Próximos Torneos</a></li>
            <li><a href="#juegos">Juegos</a></li>
            <li><a href="#noticias">Noticias</a></li>
            <li><a href="#registro">Registro</a></li>
        </ul>
    </nav>

    <!-- Próximos Torneos -->
    <section class="section">
        <div class="header-section">
            <h2>Próximos Torneos</h2>
        </div>
        <div class="carousel" >
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="carousel__lista">
                    <div class="corousel__elemento">
                        <img src="./Assets/Images/Games/Brawl-Stars.webp" alt="">
                    </div>
               
                </div>



                <button aria-label="Siguiente" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>
           
        </div>
    </section>
    <section id="juegos" class="section juegos-section">
        <div class="header-section">
            <h2>Juegos Disponibles</h2>
        </div>
        <div class="juegos-container">
        <?php foreach($torneos as $row) { ?>
            <div class="juego"><?php echo htmlspecialchars($row['nombre']); ?></div>
        
            <?php } ?>
        </div>
    </section>

    <!-- Últimas Noticias -->
    <section id="noticias" class="section">
        <div class="header-section">
            <h2>Últimas Noticias</h2>
        </div>
        <div class="noticias-container">
            <article class="noticia-card">
                <h3>¡Nuevo Torneo de Total Impact Series I!</h3>
                <p><strong>Fecha:</strong> 10 de noviembre de 2024</p>
                <p>¡Prepárate para la acción! Llega el primer torneo de Total Impact Serie de Fortnite: ¿Te lo vas a
                    perder?</p>
                <button class="read-more">Leer Más</button>
            </article>
            <article class="noticia-card">
                <h3>¡Inaguración Página Web Oficial de la DMD Community!</h3>
                <p><strong>Fecha:</strong> 09 de noviembre de 2024</p>
                <p>¡Nos complace anunciar la inauguración de nuestra nueva página web! Descubre todo lo que tenemos para
                    ofrecerte.</p>
                <button class="read-more">Leer Más</button>
            </article>
            <!-- Aquí más noticias -->
        </div>
    </section>

    <!-- Sección de Equipo -->
    <section id="equipo" class="section equipo-section">
        <div class="header-section">
            <h2>Nuestro Equipo</h2>
        </div>
        <!-- Apartado: Staff -->
        <div class="equipo-apartado">
            <h4>Staff</h4>
            <div class="equipo-lista">
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Staff/Logo-Dmondejarm.png" alt="Staff 1">
                    <p class="nombre">Dmondejarm</p>
                    <p class="puesto">Fundador</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Staff/Logo-MondyXz.jpg" alt="Staff 2">
                    <p class="nombre">MondyXz</p>
                    <p class="puesto">Soporte</p>
                </div>
                <!-- Añadir más Staff aquí -->
            </div>
        </div>

        <!-- Apartado: Programadores -->
        <div class="equipo-apartado">
            <h4>Programadores</h4>
            <div class="equipo-lista">
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Programadores/Logo-Dmondejarm.png" alt="Programador 1">
                    <p class="nombre">Dmondejarm</p>
                    <p class="puesto">Desarrollador Frontend y Discord</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Programador 2">
                    <p class="nombre">Migui</p>
                    <p class="puesto">Desarrollador Frontend</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Programadores/Logo-Yoel.jpg" alt="Programador 3">
                    <p class="nombre">Yoel</p>
                    <p class="puesto">Desarrollador Frontend</p>
                </div>
                <!-- Añadir más programadores aquí -->
            </div>
        </div>

        <!-- Apartado: Patrocinadores -->
        <div class="equipo-apartado">
            <h4>Patrocinadores</h4>
            <div class="equipo-lista">
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Patrocinador 1">
                    <p>Patrocinador 1</p>
                </div>
                <!-- Añadir más patrocinadores aquí -->
            </div>
        </div>

        <!-- Apartado: Diseñadores -->
        <div class="equipo-apartado">
            <h4>Diseñadores</h4>
            <div class="equipo-lista">
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Diseñador 1">
                    <p>AkaPelu</p>
                </div>
                <!-- Añadir más diseñadores aquí -->
            </div>
        </div>

        <!-- Apartado: Comentaristas -->
        <div class="equipo-apartado">
            <h4>Comentaristas</h4>
            <div class="equipo-lista">
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Comentaristas/Logo-Dmondejarm.png" alt="Comentarista 1">
                    <p>Dmondejarm</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Comentarista 2">
                    <p>s1moscs</p>
                </div>
                <!-- Añadir más comentaristas aquí -->
            </div>
        </div>

        <!-- Apartado: Creadores de Contenido -->
        <div class="equipo-apartado">
            <h4>Creadores de Contenido</h4>
            <div class="equipo-lista">
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Creadores de Contenido/Logo-Dmondejarm.png"
                        alt="Creador de Contenido 1">
                    <p>Dmondejarm</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/Nuestro Equipo/Creadores de Contenido/Logo-MondyXz.jpg"
                        alt="Creador de Contenido 2">
                    <p>MondyXz</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Creador de Contenido 3">
                    <p>hdanh_074</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Creador de Contenido 4">
                    <p>s1moscs</p>
                </div>
                <div class="equipo-card">
                    <img src="Assets/Images/default-profile.png" alt="Creador de Contenido 5">
                    <p>Beeleen</p>
                </div>
                <!-- Añadir más creadores de contenido aquí -->
            </div>
        </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer class="footer">
        <p>&copy; 2024 DMD Community - Todos los derechos reservados.</p>
        <div class="social-media">
            <a href="https://discord.gg/hUY4uZvEKR" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-discord.png" alt="Discord" class="social-icon">
            </a>
            <a href="https://www.twitch.tv/dmondejarm/" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-twitch.png" alt="Twitch" class="social-icon">
            </a>
            <a href="https://kick.com/dmondejarm" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-kick.png" alt="Kick" class="social-icon">
            </a>
            <a href="https://www.youtube.com/channel/UCUKvwQScM9aIWMVhpfLc0SQ" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-youtube.png" alt="YouTube" class="social-icon">
            </a>
            <a href="https://twitter.com/dmondejarm" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-x.png" alt="X" class="social-icon">
            </a>
            <a href="https://www.tiktok.com/@dmondejarm" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-tiktok.png" alt="TikTok" class="social-icon">
            </a>
            <a href="https://www.instagram.com/dmondejarm/?hl=es" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-instagram.png" alt="Instagram" class="social-icon">
            </a>
            <a href="https://es-es.facebook.com/diego.mondejar.96" target="_blank" class="social-link">
                <img src="Assets/Images/Social Network/logo-facebook.png" alt="Facebook" class="social-icon">
            </a>
        </div>
    </footer>
    <!-- Resto del contenido... -->
    
    <!-- Enlace JavaScript (Scripts) --> 
     
    <script src="./scripts.js"></script>
</body>
</html>
