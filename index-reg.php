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
// else {
//     $_SESSION['message'] = 'Доступ закрыт для неавторизованных пользователях!';
//     header("location: ./index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.css">
    <title>Регистрация</title>
    <link rel="shortcut icon" href="./images/svg/logo_purple.svg" type="image/png">
</head>

<body>
    <div class="block-reg">
        <div class="wrapper-container">
            <div class="form-content">
                <div class="div-ebassol-and-close">
                    <div class="div-ebassol-title">
                        <a class="ebassol-title">ebassol</a>
                    </div>
                    <div class="div-close-img div-close-btn-reg">
                        <a class="close-img"><img src="./images/svg/close-button.svg" alt="close"></a>
                    </div>
                </div>
                <form class="reg_form" action="./php-handler/reg.php" method="post">
                    <div class="email-and-password">
                        <div class="div-input_form-login">
                            <input type="text" class="input_form-email" name="login" placeholder="Имя пользователя" autocomplete="off" required="required" minlength="4" maxlength="20">
                        </div>
                        <div class="div-input_form-email">
                            <input type="email" class="input_form-email" name="email" placeholder="Почта" autocomplete="off" required="required" maxlength="50" >
                        </div>
                        <div class="div-input_form-password">
                            <input type="password" class="input_form-email" name="password" placeholder="Пароль" autocomplete="off" required="required" minlength="8">
                        </div>
                        <div class="div-input_form-password">
                            <input type="password" class="input_form-email" name="confirmpassword" placeholder="Подтверждение пароля" autocomplete="off" required="required" minlength="8">
                        </div>
                    </div>
                    <div class="button-panel">
                        <input type="submit" class="submit" value="Зарегистрироваться">
                    </div>
                    <div class="reset-password">
                        <a href="./index-auth.php" class="reset-pass-text div-entry-form-reg">уже есть аккаунт? авторизироваться</a>
                    </div>
                    <!-- <div class="another-entrance">
                        <svg width="178" height="1" viewBox="0 0 178 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="0.5" x2="178" y2="0.5" stroke="#454340" stroke-opacity="0.2" />
                        </svg>
                        <a class="another-entrance-text">Или</a>
                        <svg width="178" height="1" viewBox="0 0 178 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="0.5" x2="178" y2="0.5" stroke="#454340" stroke-opacity="0.2" />
                        </svg>
                    </div>
                    <div class="form-buttons">
                        <div class="google-btn">
                            <a class="google-img"><img src="./images/svg/google_logo.svg" alt="Google"></a>
                            <a class="google-button-text">Google</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>