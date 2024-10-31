<?php

include 'conexionroot.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="registro.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="wrapper">
        <div class="login_box">
            <div class="login-header">
                <span>Register</span>
            </div>
            <form action="Comprobacion.php" method="post">
            <div class="input_box">
                <input type="text" name="username" id="user" class="input-field" required>
                <label for="user" class="label">Username</label>
                <i class="bx bx-user icon"></i>

            </div>
            <div class="input_box">
                <input type="password" name="passwd" id="pass" class="input-field" required>
                <label for="pass" class="label">Password</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>



                <div class="input_box">
                    <input type="password" name="passwd_confirm"id="confirm_pass" class="input-field" required>
                    <label for="confirm_pass" class="label">Confirm Password</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>
                <div class="input_box">
                    <input type="submit" value="Register" class="input_submit">
                </div>
            </form>
                <div class="login-footer">
                    <a href="login.html">Already have an account?</a>
                </div>

            </div>

</body>

</html>