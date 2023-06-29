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
    else {
      $_SESSION['message'] = 'Доступ есть только у админов!';
      header("location: ./index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора - Добавление в плейлист</title>
    <link rel="stylesheet" href="./scss/main.css">
    <link rel="shortcut icon" href="./images/svg/logo_green.svg" type="image/png">
</head>

<body>

    <header>
        <div class="admin-container">
            <ul class="main-menu-panel">
                <li class="main-menu_item"><a href="./index-panel.php" class="main-menu__link"><img src="./images/svg/logo_green.svg" alt="logo_purple" class="logo_purple"></a></li>
                <li class="main-menu-panel_item"><a href="./track-panel.php" class="menu-item-panel">Трек</a></li>
                <li class="main-menu-panel_item"><a href="./playlists-panel.php" class="menu-item-panel">Плейлисты</a></li>
                <li class="main-menu-panel_item"><a href="./musicians-panel.php" class="menu-item-panel">Музыканты</a></li>
                <li class="main-menu-panel_item"><a href="./albums-panel.php" class="menu-item-panel">Альбомы</a></li>
                <li class="main-menu-panel_item"><a href="./users-panel.php" class="menu-item-panel">Пользователи</a></li>
                <li class="main-menu-panel_item"><a href="./genre-panel.php" class="menu-item-panel">Жанр</a></li>
                <li class="main-menu-panel_item"><a href="./favorite-panel.php" class="menu-item-panel">Любимое</a></li>
                <li class="main-menu-panel_item"><a href="./adding_to_a_playlist-panel.php" class="menu-item-panel admin-menu-pressed">Добавление в плейлист</a></li>
                <li class="main-menu-panel_item"><a href="./adding_in_favorite-panel.php" class="menu-item-panel">Добавление в любимое</a></li>
                <li class="main-menu-panel_item"><a href="./adding_in_album-panel.php" class="menu-item-panel">Добавление в альбом</a></li>
            </ul>
        </div>
        <hr>
    </header>

    <div class="div-title-admin">
        <div class="admin-container">
            <div class="add-btn-divs">
                <div class="div-title-admin">
                    <h1 class="title-admin">Добавление в плейлист</h1>
                </div>
                <div class="btn_add">
                    <a href="./create_adding_to_a_playlist.php">Добавить запись</a>
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
                    <p class="admin_table_cell-text margin-admin-user-table">Название плейлиста</p>
                </div>
                <div class="table_sell">
                    <p class="admin_table_cell-text margin-admin-user-table">Название трека</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['ID_adding_to_a_playlist'])) {
        $ADTD = $_GET['ID_adding_to_a_playlist'];
        $qDeleteADT= "DELETE FROM `adding_to_a_playlist` WHERE ID_adding_to_a_playlist='$ADTD'";
        addslashes($qDeleteADT);
        $resDeleteaADT = mysqli_query($connect, $qDeleteADT) or die(mysqli_error($connect));
    }

    $qInfoADT = "SELECT * FROM adding_to_a_playlist, playlists, track WHERE adding_to_a_playlist.ID_playlists =  playlists.ID_playlists AND adding_to_a_playlist.ID_track = track.ID_track";
    addslashes($qInfoADT);
    $resInfoADT = mysqli_query($connect, $qInfoADT) or die(mysqli_error($connect));
    while ($InfoADT = mysqli_fetch_object($resInfoADT)) {
        echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell_first admin_projects_table_id\">
                    <p>$InfoADT->ID_adding_to_a_playlist</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoADT->playlist_name</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoADT->track_name</p>
                </div>
                <div class=\"admin_projects_table_act\">
                    <a href=\"edit_adding_to_a_playlist.php?idA=$InfoADT->ID_adding_to_a_playlist\"><img class=\"admin_table_act_image\" src=\"./images/svg/edit_green.svg\"></a>
                <a href=\"?ID_adding_to_a_playlist=$InfoADT->ID_adding_to_a_playlist\"><img class=\"admin_table_act_image\" src=\"./images/svg/delete_green.svg\"></a>
            </div>
        </div>
    </div>
";
    }
    ?>

</body>

</html>