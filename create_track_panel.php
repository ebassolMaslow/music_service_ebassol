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
        <title>Трек добавление</title>
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
                            <a href="./track-panel.php" class="close-img"><img src="./images/svg/close-button.svg" alt="close"></a>
                        </div>
                    </div>
                    <form class="table_add" action="./create_track_handler.php" method="post">
                        <div class="table_add_row">
                            <div class="div-input_form-login">
                                <input type="text" class="input_form-email" name="track_name" placeholder="Название трека">
                            </div>
                            <div class="div-input_form-email">
                                <?php
                                $qInfoMusician = "SELECT *
                                            FROM musicians";
                                addslashes($qInfoMusician);
                                $resInfoMusician = mysqli_query($connect, $qInfoMusician) or die(mysqli_error($connect));
                                echo "<select class=\"select-track\" name=\"musician\">";
                                while ($InfoMusician = mysqli_fetch_object($resInfoMusician)) {
                                    echo "<option name=\"" . $InfoMusician->ID_musicians . "\" value=\"" . $InfoMusician->ID_musicians . "\">" . $InfoMusician->musicians_nickname . "</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                            <div class="div-input_form-password">
                                <input type="text" class="input_form-email" name="Number_of_auditions" placeholder="Количество прослушиваний">
                            </div>
                            <div class="div-input_form-password">
                                <input class="select-track-date" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                            this.value = v + '.';
                            } else if (v.match(/^\d{4}\.\d{2}$/) !== null) {
                            this.value = v + '.';
                            }" maxlength="10" name="year_of_release" placeholder="Год выпуска">
                            </div>
                            <div class="div-input_form-password">
                                <?php
                                $qInfoMusician = "SELECT *
                                            FROM genre";
                                addslashes($qInfoMusician);
                                $resInfoMusician = mysqli_query($connect, $qInfoMusician) or die(mysqli_error($connect));
                                echo "<select class=\"select-track\" name=\"genre\">";
                                while ($InfoMusician = mysqli_fetch_object($resInfoMusician)) {
                                    echo "<option name=\"" . $InfoMusician->ID_genre . "\" value=\"" . $InfoMusician->ID_genre . "\">" . $InfoMusician->genre . "</option>";
                                }
                                echo "</select>";
                                ?>
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