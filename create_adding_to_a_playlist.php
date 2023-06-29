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
    <title>Добавление в плейлист добавление</title>
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
                        <a href="./adding_to_a_playlist-panel.php" class="close-img"><img src="./images/svg/close-button.svg" alt="close"></a>
                    </div>
                </div>
                <form class="table_add" action="./create_adding_to_a_playlist-handler.php" method="post">
                    <div class="table_add_row">
                        <div class="div-input_form-email">
                            <?php
                            $qInfoADT = "SELECT * FROM playlists";
                            addslashes($qInfoADT);
                            $resInfoADT = mysqli_query($connect, $qInfoADT) or die(mysqli_error($connect));
                            echo "<select class=\"select-track\" name=\"playlists\">";
                            while ($InfoADT = mysqli_fetch_object($resInfoADT)) {
                                echo "<option name=\"" . $InfoADT->ID_playlists . "\" value=\"" . $InfoADT->ID_playlists . "\">" . $InfoADT->playlist_name . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="div-input_form-password">
                            <?php
                            $qInfoplaylists = "SELECT * FROM track";
                            addslashes($qInfoplaylists);
                            $resInfoplaylists = mysqli_query($connect, $qInfoplaylists) or die(mysqli_error($connect));
                            echo "<select class=\"select-track\" name=\"track\">";
                            while ($InfoUsers = mysqli_fetch_object($resInfoplaylists)) {
                                echo "<option name=\"" . $InfoUsers->ID_track . "\" value=\"" . $InfoUsers->ID_track . "\">" . $InfoUsers->track_name . "</option>";
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