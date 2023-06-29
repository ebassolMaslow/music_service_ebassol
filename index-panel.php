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
    
    if($roles !== 'Администратор'){
      header("location:index-panel.php");
      $_SESSION['message'] = 'ПОКАААААААААААААа';
    }
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
        <li class="main-menu-panel_item"><a href="./track-panel.php" class="menu-item-panel">Трек</a></li>
        <li class="main-menu-panel_item"><a href="./playlists-panel.php" class="menu-item-panel">Плейлисты</a></li>
        <li class="main-menu-panel_item"><a href="./musicians-panel.php" class="menu-item-panel">Музыканты</a></li>
        <li class="main-menu-panel_item"><a href="./albums-panel.php" class="menu-item-panel">Альбомы</a></li>
        <li class="main-menu-panel_item"><a href="./users-panel.php" class="menu-item-panel">Пользователи</a></li>
        <li class="main-menu-panel_item"><a href="./genre-panel.php" class="menu-item-panel">Жанр</a></li>
        <li class="main-menu-panel_item"><a href="./favorite-panel.php" class="menu-item-panel">Любимое</a></li>
        <li class="main-menu-panel_item"><a href="./adding_to_a_playlist-panel.php" class="menu-item-panel">Доб. в плейлист</a></li>
        <li class="main-menu-panel_item"><a href="./adding_in_favorite-panel.php" class="menu-item-panel">Доб. в любимое</a></li>
        <li class="main-menu-panel_item"><a href="./adding_in_album-panel.php" class="menu-item-panel">Доб. в альбом</a></li>
        <li class="main-menu-panel_item"><a href="./index.php" class="menu-item-panel home">На сайт</a></li>
        <li class="main-menu_item"><a class="menu-item exit-button " href="./php-handler/exit.php">Выйти</a></li>
      </ul>
    </div>
    <hr>
  </header>

  <div class="div-title-admin">
    <div class="admin-container">
      <div class="add-btn-divs">
        <div class="div-title-admin">
          <h1 class="title-admin">Статистика</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="admin-container">
    <div class="statistics-container">

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Список всех треков жанра поп</p>
          <?php

          $qInfoGenre = "SELECT track_name FROM track WHERE ID_genre = 1";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->track_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Cписок всех треков музыканта pinkpagejpeg666</p>
          <?php

          $qInfoGenre = "SELECT track_name FROM track WHERE ID_musician = 1";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->track_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Cписок всех альбомов исполнителя pinkpagejpeg666</p>
          <?php

          $qInfoGenre = "SELECT album_name FROM albums WHERE ID_musician = 1";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->album_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Cписок всех треков, включенных в плейлист "Под пиво"</p>
          <?php

          $qInfoGenre = "SELECT playlists.playlist_name, track.track_name
      FROM adding_to_a_playlist, playlists, track
      WHERE adding_to_a_playlist.ID_playlists = 1 AND adding_to_a_playlist.ID_playlists = playlists.ID_playlists AND adding_to_a_playlist.ID_track = track.ID_track";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->track_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

    </div>
  </div>


  <div class="admin-container">
    <div class="statistics-container">

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Список всех плейлистов</p>
          <?php

          $qInfoGenre = "SELECT playlist_name FROM playlists";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->playlist_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Список всех пользователей</p>
          <?php

          $qInfoGenre = "SELECT login FROM users";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->login</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Список всех плейлистов, созданных пользователем admin</p>
          <?php

          $qInfoGenre = "SELECT playlist_name FROM playlists WHERE ID_users = 1";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->playlist_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics">
          <p class="admin_table_cell-text margin-admin-user-table table_row title">Список всех треков, которые пользователь admin добавил в свою библиотеку.</p>
          <?php

          $qInfoGenre = "SELECT favorite.favorite_photo, track.track_name
      FROM adding_in_favorite, track, favorite
      WHERE adding_in_favorite.ID_favorite = 1 AND adding_in_favorite.ID_favorite = favorite.ID_favorite AND adding_in_favorite.ID_track = track.ID_track";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->track_name</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

    </div>
  </div>

  <div class="admin-container">
    <div class="statistics-container">

      <div class="admin-container">
        <div class="statistics-asc">
          <p class="admin_table_cell-text margin-admin-user-table table_row title title-center">Список всех треков, отсортированных по количеству прослушиваний</p>
          <?php

          $qInfoGenre = "SELECT track.track_name, track.Number_of_auditions
                      FROM track
                      ORDER BY Number_of_auditions ASC";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->track_name</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->Number_of_auditions</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

      <div class="admin-container">
        <div class="statistics-asc">
          <p class="admin_table_cell-text margin-admin-user-table table_row title title-center">Cписок всех треков, которые были выпущены в 2002 году</p>
          <?php

          $qInfoGenre = "SELECT track.track_name, track.year_of_release
                      FROM track
                      WHERE year_of_release = '2002-02-02'";
          addslashes($qInfoGenre);
          $resInfoGenre = mysqli_query($connect, $qInfoGenre) or die(mysqli_error($connect));
          while ($InfoGenre = mysqli_fetch_object($resInfoGenre)) {
            echo "
    <div class=\"body-table\">
        <div class=\"admin-container\">
            <div class=\"admin_table_row\">
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->track_name</p>
                </div>
                <div class=\"admin_table_cell admin_projects_table_name\">
                    <p class=\"admin_table_cell-text margin-admin-user-table\">$InfoGenre->year_of_release</p>
                </div>
            </div>
        </div>
    </div>
";
          }
          ?>
        </div>
      </div>

    </div>
  </div>

</body>

</html>