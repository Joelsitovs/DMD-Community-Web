<?php
function loadEnv($filePath = __DIR__ . '/.env') {
    if (!file_exists($filePath)) {
        throw new Exception("Archivo .env no encontrado en la ruta: $filePath");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignora líneas que son comentarios
        if (strpos(trim($line), '#') === 0) continue;

        // Asegúrate de que haya un signo de igual en la línea
        if (strpos($line, '=') === false) {
            continue; // O puedes lanzar una excepción
        }
        // Divide la línea en clave y valor
        list($key, $value) = explode('=', $line, 2);
        // Asigna cada variable a $_ENV
        $_ENV[trim($key)] = trim($value);
    }
}

// Llama a la función para cargar las variables de entorno
loadEnv();

// Ahora puedes usar las variables de entorno en tu código
$clientID = $_ENV['CLIENT_ID'] ?? null; // Usa null coalescing para manejar la ausencia de la clave
$clientSecret = $_ENV['CLIENT_SECRET'] ?? null;
$redirectURI = $_ENV['REDIRECT_URI'] ?? null;


