<?php
// Incluir la conexión a la base de datos
include 'conexionusers.php';
// Función para validar entradas
function validar_usuario($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Funcion para Campos requeridos
function campos_requeridos($usuario,$contraseña,$contraseña_confirm){
    return !empty($usuario) && !empty($contraseña) && !empty($contraseña_confirm);
}

// Funcion para comparar contraseñas
function comparar_contraseñas($contraseña,$contraseña_confirm){
    return ($contraseña === $contraseña_confirm);
}

// Funcion para redirigir con mensaje de error
function redirigir_con_error($mensaje){
    header("Location: usersesion.php?error=".urlencode($mensaje));
    exit();
}

// Funcion para redirigir con mensaje de exito
function redirigir_con_exito($mensaje){
    header("Location: usersesion.php?success=".urlencode($mensaje));
    exit();
}

// Funcion para verificar si el usuario ya existe en la base de datos
function usuario_existente($conexion,$usuario){
    // Preparar la consulta SQL
    $sql = "SELECT * FROM users WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    // Verificar si la preparación fue exitosa
    if(stmt === false) die('Eror enla preparacion de la consulta: ' . htmlspecialchars($conexion->error));
    // Vincular los parametros
    $stmt->bind_param("s",$usuario);
    // Ejecutar la consulta
    if(!$stmt->execute()) die('Error en la ejecucion de la consulta: ' . htmlspecialchars($stmt->error));
    // Retornar el resultado si existe
    return $stmt->get_result()->fetch_assoc(); // Retorna el usuario si existe
    // Cerrar la consulta
    $stmt->close();
}
// Funcion para encriptar la contraseña
function encriptar_contraseña($contraseña){
    return password_hash($contraseña,PASSWORD_DEFAULT);
}

// Funcion para registrar un nuevo usuario
function registrar_usuario($conexion,$usuario,$contraseña){
    // Preparar la consulta SQL
    $sql = "INSERT INTO users (usuario, contraseña) VALUES (?,?)";
    $stmt = $conexion->prepare($sql);
    // Verificar si la preparacion fue exitosa
    if ($stmt === false) die('Error en la preparacion de la consulta: ' . htmlspecialchars($conexion->error));
    // Encriptar la contraseña
    $hash = encriptar_contraseña($contraseña);
    // Vincular los parametros 
    $stmt->bind_param("ss",$usuario,$hash);
    // Ejecutar la consulta
    if(!$stmt->execute()) die('Error en la ejecucion de la consulta: ' . htmlspecialchars($stmt->error));
    // Cerrar la consulta
    $stmt->close();
}
// Funcion para recibir los datos del formulario
function recibirdatos($conexion){
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['username'],$_POST['passwd'],$_POST['passwd_confirm'] )){
        // Limpiar y validar los datos
        $usuario = validar_usuario($_POST['username']);
        $contraseña = validar_usuario($_POST['passwd']);
        $contraseña_confirm = validar_usuario($_POST['passwd_confirm']);
        // Verificar si los campos no estan vacios
        if(!campos_requeridos($usuario,$contraseña,$contraseña_confirm)){
            redirigir_con_error('Por favor complete todos los campos');
        }
        // Verificar si las contraseñas coinciden
        if(!comparar_contraseñas($contraseña,$contraseña_confirm)){
            redirigir_con_error('Las contraseñas no coinciden');
        }
        // Verificar si el usuario ya existe
        if(usuario_existente($conexion,$usuario)){
            redirigir_con_error('El usuario ya existe');
        }
        // Registrar el nuevo usuario
        registrar_usuario($conexion,$usuario,$contraseña);
        redirigir_con_exito('Usuario registrado con exito');
        exit();
    } else {
        redirigir_con_error('Por favor complete todos los campos');
    }

}
// Recibir los datos del formulario
recibirdatos($conexion);
?>
