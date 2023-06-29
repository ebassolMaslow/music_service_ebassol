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
    <title>Панель администратора - треки</title>
    <link rel="stylesheet" href="./scss/main.css">
    <link rel="shortcut icon" href="./images/svg/logo_green.svg" type="image/png">
</head>

<body>

    <header>
        <div class="admin-container">
            <ul class="main-menu-panel">
                <li class="main-menu_item"><a href="./index-panel.php" class="main-menu__link"><img src="./images/svg/logo_green.svg" alt="logo_purple" class="logo_purple"></a></li>
                <li class="main-menu-panel_item"><a href="./track-panel.php" class="menu-item-panel admin-menu-pressed">Трек</a></li>
                <li class="main-menu-panel_item"><a href="./playlists-panel.php" class="menu-item-panel">Плейлисты</a></li>
                <li class="main-menu-panel_item"><a href="./musicians-panel.php" class="menu-item-panel">Музыканты</a></li>
                <li class="main-menu-panel_item"><a href="./albums-panel.php" class="menu-item-panel">Альбомы</a></li>
                <li class="main-menu-panel_item"><a href="./users-panel.php" class="menu-item-panel">Пользователи</a></li>
                <li class="main-menu-panel_item"><a href="./genre-panel.php" class="menu-item-panel">Жанр</a></li>
                <li class="main-menu-panel_item"><a href="./favorite-panel.php" class="menu-item-panel">Любимое</a></li>
                <li class="main-menu-panel_item"><a href="./adding_to_a_playlist-panel.php" class="menu-item-panel">Добавление в плейлист</a></li>
                <li class="main-menu-panel_item"><a href="./adding_in_favorite-panel.php" class="menu-item-panel">Добавление в любимое</a></li>
                <li class="main-menu-panel_item"><a href="./adding_in_album-panel.php" class="menu-item-panel">Добавление в альбом</a></li>
                <li class="main-menu_item"><a class="menu-item" href="./php-handler/exit.php">Выйти</a></li>
            </ul>
        </div>
        <hr>
    </header>

    <div class="div-title-admin">
        <div class="admin-container">
            <div class="add-btn-divs">
                <div class="div-title-admin">
                    <h1 class="title-admin">Треки</h1>
                </div>
                <div class="btn_add">
                    <a href="./create_track_panel.php">Добавить запись</a>
                </div>
            </div>
        </div>
    </div>

    <div class="table">
        <div class="admin-container">
            <div class="table_row title">
                <div class="table_sell id">
                    <p class="admin_table_cell_first">ID</p>
                </div>
                <div class="table_sell">
                    <p class="admin_table_cell-text">Название трека</p>
                </div>
                <div class="table_sell">
                    <p class="admin_table_cell-text">Имя музыканта</p>
                </div>
                <div class="table_sell">
                    <p class="admin_table_cell-text">Количество прослушиваний</p>
                </div>
                <div class="table_sell">
                    <p class="admin_table_cell-text">Год релиза</p>
                </div>
                <div class="table_sell">
                    <p class="admin_table_cell-text">Жанр</p>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_GET['ID_track'])) {
        $trackD = $_GET['ID_track'];
        $qDeleteTrack = "DELETE FROM `track` WHERE ID_track='$trackD'";
        addslashes($qDeleteTrack);
        $resDeleteTrack = mysqli_query($connect, $qDeleteTrack) or die(mysqli_error($connect));
    }

    $qInfoTrack = "SELECT *
                    FROM track, musicians, genre
                    WHERE track.ID_musician = musicians.ID_musicians and track.ID_genre = genre.ID_genre";
    addslashes($qInfoTrack);
    $resInfoTrack = mysqli_query($connect, $qInfoTrack) or die(mysqli_error($connect));
    while ($InfoTrack = mysqli_fetch_object($resInfoTrack)) {
        echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell_first admin_projects_table_id\">
                    <p>$InfoTrack->ID_track</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text\">$InfoTrack->track_name</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_id_order\">
                    <p class=\"admin_table_cell-text\">$InfoTrack->musicians_nickname</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_id_order\">
                    <p class=\"admin_table_cell-text\">$InfoTrack->Number_of_auditions</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_id_order\">
                    <p class=\"admin_table_cell-text\">$InfoTrack->year_of_release</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_id_order\">
                    <p class=\"admin_table_cell-text\">$InfoTrack->genre</p>
                </div>
                <div class=\"admin_projects_table_act\">
                    <a href=\"edit_track.php?idA=$InfoTrack->ID_track\"><img class=\"admin_table_act_image\" src=\"./images/svg/edit_green.svg\"></a>
                <a href=\"?ID_track=$InfoTrack->ID_track\"><img class=\"admin_table_act_image\" src=\"./images/svg/delete_green.svg\"></a>
            </div>
        </div>
    </div>
";
    }
    ?>

</body>

</html>