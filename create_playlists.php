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
} else {
    $_SESSION['message'] = 'Доступ есть только у админов!';
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Плейлист добавление</title>
    <link rel="stylesheet" href="./scss/main.css">
    <link rel="shortcut icon" href="./images/svg/logo_green.svg" type="image/png">
</head>

<body>
    <div class="track_create">
        <div class="wrapper-container">
            <div class="form-content">
                <div class="div-ebassol-and-close">
                    <div class="div-create_title">
                        <a class="create_title">Добавление</a>
                    </div>
                    <div class="div-close-img div-close-btn-reg">
                        <a href="./playlists-panel.php" class="close-img"><img src="./images/svg/close-button.svg" alt="close"></a>
                    </div>
                </div>
                <form class="table_add" action="./create_playlists_handler.php" method="post">
                    <div class="table_add_row">
                        <div class="div-input_form-login">
                            <input type="text" class="input_form-email" name="playlist_name" placeholder="Имя плейлиста" required>
                        </div>
                        <div class="div-input_form-login">
                            <input type="text" class="input_form-email" name="playlist_photo" placeholder="Фото плейлиста">
                        </div>
                        <div class="div-input_form-email">
                            <?php
                            $qInfoplaylists = "SELECT * FROM Users";
                            addslashes($qInfoplaylists);
                            $resInfoplaylists = mysqli_query($connect, $qInfoplaylists) or die(mysqli_error($connect));
                            echo "<select class=\"select-track\" name=\"login\">";
                            while ($InfoUsers = mysqli_fetch_object($resInfoplaylists)) {
                                echo "<option name=\"" . $InfoUsers->ID_users . "\" value=\"" . $InfoUsers->ID_users . "\">" . $InfoUsers->login . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                    </div>
            </div>
            <div class="button-panel">
                <input type="submit" class="submit" value="Добавить">
            </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>