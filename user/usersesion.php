<?php
session_start();
// Revisa si hay un mensaje de error en la URL
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
// Revisa si hay un mensaje de éxito en la URL
$success = isset($_GET['success']) ? htmlspecialchars($_GET['success']) : '';

// si el usuario ya creo una cuenta, lo rediroge a iniciar sesión
// si pulsa en already have an account lo redirige a iniciar sesión

if (isset($_SESSION['user'])) {
    header('Location: ../ola.php');
    exit;
}
// Determinar si se está en la acción de login
$islogin = !isset($_GET['action']) || $_GET['action'] == 'login';


require_once 'vendor/autoload.php';
require_once 'config.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope("email");
$client->addScope("profile");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $islogin ? 'Login': 'Registro';?> </title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time(); ?>" />
</head>

<body>
    <div class="wrapper">
        <div class="login_box">
            <div class="login-header">
            <span><?php echo $islogin ? 'Login' : 'Registro';  ?> </span>
            </div>
            <!-- Mensaje de error  o mensaje de exito -->
            <?php if ($error || $success): ?>
            <div class="<?php echo $error ? 'error' : 'success'; ?>">
                <?php echo $error ? $error : $success; ?>
            </div>
            <?php endif; ?>

            <!-- Formulario de registro -->
            <form action="<?php echo $islogin ? './login.php' :  './Comprobacionusers.php';?>" method="post">
                <div class="input_box">
                    <input type="text" name="username" id="user" class="input-field" required />
                    <label for="user" class="label">Username</label>
                    <i class="bx bx-user icon"></i>
                </div>
                <?php if (!$islogin): ?>
                <div class="input_box">
                    <input type="email" name="email" id="email" class="input-field" required />
                    <label for="email" class="label">email</label>
                    <i class="bx bx-user icon"></i>
                </div>
                <?php endif; ?>
                <div class="input_box">
                    <input type="password" name="passwd" id="pass" class="input-field" required />
                    <label for="pass" class="label">Password</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>
                <?php if (!$islogin): ?>
                <div class="input_box">
                    <input type="password" name="passwd_confirm" id="confirm_pass" class="input-field" required />
                    <label for="confirm_pass" class="label">Confirm Password</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>
                <?php endif; ?>
                <div class="input_box">
                    <input type="submit" value="<?php echo $islogin ? 'Login' : 'Registro'  ?>" class="input_submit" />
                </div>
            </form>

            <div class="login-footer">
                <?php if ($islogin): ?>
                    <a href="?action=register">Create an account</a>
                <?php else: ?>
                    <a href="?action=login">Already have an account?</a>               
                <?php endif; ?>
                <?php
                echo "<a href='".$client->createAuthUrl()."'>Iniciar sesión con Google</a>";
                ?>

            </div>
        </div>
    </div>
</body>

</html>


