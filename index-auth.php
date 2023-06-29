<?php
session_start();

include "./php_connect/connect.php";

if (isset($_SESSION['ID_users'])) {
    $IDuser = $_SESSION['ID_users'];
    if ($IDuser === '') {
        unset($IDuser);
    }
}
if (isset($IDuser)) {
    $query_access = "SELECT * FROM users, role WHERE ID_users = '$IDuser' AND users.ID_role = role.iD_role";
    addslashes($query_access);
    $res_access = mysqli_query($connect, $query_access);
    $row_access = mysqli_fetch_object($res_access);
    $roles = $row_access->name_role;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>ebassol - Музыка на любой вкус</title>
    <link rel="shortcut icon" href="./images/svg/logo_purple.svg" type="image/png">
</head>

<body>

    <!-- форма авторизации -->

    <div class="block-auth" id="auth">
        <div class="wrapper-container">
            <div class="form-content">
                <div class="div-ebassol-and-close">
                    <div class="div-ebassol-title">
                        <a class="ebassol-title">ebassol</a>
                    </div>
                </div>
                <form class="auth_form" action="./php-handler/auth.php" method="post">
                    <div class="email-and-password">
                        <div class="div-input_form-email">
                            <input type="text" class="input_form-email" name="login" placeholder="Имя пользователя" autocomplete="off" required="required" minlength="4" maxlength="20">
                        </div>
                        <div class="div-input_form-password">
                            <input type="password" class="input_form-email" name="password" placeholder="Пароль" autocomplete="off" required="required" minlength="8">
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LcDvsomAAAAAMMR1hO7tisYI_thlWokdKccOeUo"></div>
                    <input type="submit" name="submit" class="submit" value="Авторизоваться">
                    <div class="reset-password">
                        <a href="./index-reg.php" class="reset-pass-text">ещё нет аккаунта? зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>