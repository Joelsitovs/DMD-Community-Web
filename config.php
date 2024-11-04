<?php
function loadEnv($filePath = __DIR__ . '/.env') {
    if (!file_exists($filePath)) {
        throw new Exception("Archivo .env no encontrado.");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // Ignora comentarios
        list($key, $value) = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value); // Asigna cada variable a $_ENV
    }
}

// Carga las variables de entorno
loadEnv();
$clientID = $_ENV['CLIENT_ID'] ?? ''; // Verifica que las variables están disponibles
$clientSecret = $_ENV['CLIENT_SECRET'] ?? '';
$redirectURI = $_ENV['REDIRECT_URI'] ?? '';


