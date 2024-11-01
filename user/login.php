<?php
session_start();
include 'conexionusers.php';

// Función para validar entradas
function validar_usuario($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Función para verificar campos requeridos
function campos_requeridos($usuario, $contraseña) {
    return !empty($usuario) && !empty($contraseña);
}

// Función para redirigir con mensaje de error
function redirigir_con_error($mensaje) {
    header("Location: usersesion.php?action=login&error=" . urlencode($mensaje));
    exit();
}

// Función para comprobar si el usuario existe en la base de datos y verificar la contraseña
function comprobar_usuario($conexion, $usuario, $contraseña) {
    $sql = "SELECT * FROM users WHERE Usuario = ?";
    $stmt = $conexion->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . htmlspecialchars($conexion->error));
    }

    // Vincular los parámetros
    $stmt->bind_param("s", $usuario);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        die('Error en la ejecución de la consulta: ' . htmlspecialchars($stmt->error));
    }

    // Obtener el resultado y verificar si la contraseña es correcta
    $resultado = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // Comprobar si el usuario existe y la contraseña es válida
    if ($resultado && password_verify($contraseña, $resultado['Contraseña'])) {
        return $resultado; // Retorna el usuario si la contraseña es correcta
    }
    return false; // Usuario o contraseña incorrectos
}


// Función para iniciar sesión
function iniciar_sesion($usuario_datos) {
    // Iniciar la sesión
    session_start();

    // Almacenar los datos del usuario en la sesión
    $_SESSION['user'] = $usuario_datos['Usuario'];

    // Redirigir al usuario a la página de inicio
    header('Location: ../ola.php');
    exit();
}
// Función para el formulario de login
function formulario_login($conexion) {
    if (isset($_POST['username'], $_POST['passwd'])) {
        // Validar y asignar valores de entrada
        $usuario = validar_usuario($_POST['username']);
        $contraseña = validar_usuario($_POST['passwd']);

        // Verificar si los campos requeridos no están vacíos
        if (!campos_requeridos($usuario, $contraseña)) {
            redirigir_con_error('Todos los campos son requeridos');
        }

        // Comprobar si el usuario existe y la contraseña es correcta
        $usuario_datos = comprobar_usuario($conexion, $usuario, $contraseña);
        if (!$usuario_datos) {
            redirigir_con_error('Usuario o contraseña incorrectos');
        }

        // Iniciar sesión
        iniciar_sesion($usuario_datos);
    } else {
        redirigir_con_error('Los datos de inicio de sesión son requeridos.');
    }
}

// Llamada a la función del formulario de login
formulario_login($conexion);

?>
