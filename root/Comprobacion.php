<?php
include('conexionroot.php');
include('Registerroot.php');

// Función para validar entradas
function validar_usuario($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Verificación de datos POST
if (isset($_POST['username']) && isset($_POST['passwd']) && isset($_POST['passwd_confirm'])) {
    $usuario = validar_usuario($_POST['username']);
    $contraseña = validar_usuario($_POST['passwd']);
    $contraseña_confirm = validar_usuario($_POST['passwd_confirm']);

    // Verificar si las contraseñas coinciden
    if ($contraseña === $contraseña_confirm) {
        if (empty($usuario)) {
            header("Location: Registerroot.php?error=El nombre de usuario es requerido");
            exit();
        } elseif (empty($contraseña)) {
            header("Location: Registerroot.php?error=La contraseña es requerida");
            exit();
        } else {
         $sql = "Insert into users_root (nombre,usuario,Contraseña)Values(?,?,?)";

        }
        }

    }