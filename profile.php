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
    $query_access = "SELECT * FROM `users`, `role` WHERE ID_users = '$IDuser' AND users.ID_role = role.iD_role";
    addslashes($query_access);
    $res_access = mysqli_query($connect, $query_access);
    $row_access = mysqli_fetch_object($res_access);
    $roles = $row_access->name_role;
} else {
    $_SESSION['message'] = 'Доступ закрыт для неавторизованных пользователях!';
    header("location: ./index-auth.php");
}

$qInfoTrack = "SELECT * FROM users WHERE ID_users='$IDuser'";
addslashes($qInfoTrack);
$resInfoTrack = mysqli_query($connect, $qInfoTrack) or die(mysqli_error($connect));
$InfoTrack = mysqli_fetch_object($resInfoTrack);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "" . $InfoTrack->login . ""; ?>:Профиль</title>
    <link rel="stylesheet" href="./scss/main.css">
    <link rel="shortcut icon" href="./images/svg/logo_purple.svg" type="image/png">
</head>

<body>

    <!-- шапка -->

    <header>
        <div class="container">
            <ul class="main-menu">
                <li class="main-menu_item"><a href="./index.php" class="main-menu__link"><img src="./images/svg/logo_purple.svg" alt="logo_purple" class="logo_purple"></a></li>
                <li class="main-menu_item"><a href="./index.php" class="menu-item">Главная</a></li>
                <li class="main-menu_item"><a href="./genres.php" class="menu-item">Жанры</a></li>
                <li class="main-menu_item"><a href="./musician.php" class="menu-item">Исполнители</a></li>
                <li class="main-menu_item"><a href="./playlists.php" class="menu-item">Плейлисты</a></li>
                <?php
                if (isset($roles)) {
                    if ($roles == 'Администратор') {
                        echo "<li class=\"main-menu_item\"><a href='./index-panel.php' class='main-menu__link'><img src=\"./images/svg/admin-img.svg\" alt=\"admin-img\" class=\"admin-img\"></a></li>";
                    }
                }
                ?>
                <li class="main-menu_item"><a class="main-menu__link"><img src="./images/svg/search.svg" alt="search" class="search"></a></li>
                <li class="main-menu_item"><a href="./profile.php" class="main-menu__link"><img src="./images/svg/profile_purple.svg" alt="profile_white" class="profile_white"></a></li>

                <li class="main-menu_item"><a class="menu-item exit-button" href="./php-handler/exit.php">Выйти</a></li>
            </ul>
        </div>
        <hr>
    </header>

    <!-- Блок с данными пользователя -->

    <div class="playlist-and-albums">
        <div class="container">
            <div class="photo-and-button">
                <div class="profile-img">
                    <div class="profile-img-billet">
                        <svg class="upload" width="45" height="54" viewBox="0 0 45 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0714 40.4757H28.9286C30.6964 40.4757 32.1429 39.0293 32.1429 37.2614V21.19H37.2536C40.1143 21.19 41.5607 17.7186 39.5357 15.6936L24.7821 0.939999C24.4848 0.642023 24.1316 0.40562 23.7427 0.244322C23.3539 0.0830249 22.937 0 22.5161 0C22.0951 0 21.6783 0.0830249 21.2894 0.244322C20.9006 0.40562 20.5474 0.642023 20.25 0.939999L5.49643 15.6936C3.47143 17.7186 4.88571 21.19 7.74643 21.19H12.8571V37.2614C12.8571 39.0293 14.3036 40.4757 16.0714 40.4757ZM3.21429 46.9043H41.7857C43.5536 46.9043 45 48.3507 45 50.1186C45 51.8864 43.5536 53.3329 41.7857 53.3329H3.21429C1.44643 53.3329 0 51.8864 0 50.1186C0 48.3507 1.44643 46.9043 3.21429 46.9043Z" fill="#F0F0F0" />
                        </svg>
                    </div>
                </div>
                <div class="button-and-text">
                    <div class="profile-field profile-field-margin">
                        <div class="div nickname-profile">
                            <p class="profile-title-text">Имя пользователя</p>
                        </div>
                        <div class="empty-field">
                            <p class="text-field"><?php echo "" . $InfoTrack->login . ""; ?></p>
                            <a class="edit"><img src="./images/svg/edit.svg" alt="edit" class="edit"></a>
                        </div>
                    </div>
                    <div class="profile-field">
                        <div class="div nickname-profile">
                            <p class="profile-title-text">Почта</p>
                        </div>
                        <div class="empty-field">
                            <p class="text-field"><?php echo "" . $InfoTrack->email . ""; ?></p>
                            <a class="edit"><img src="./images/svg/edit.svg" alt="edit" class="edit"></a>
                        </div>
                    </div>
                    <div class="profile-field">
                        <div class="div nickname-profile">
                            <p class="profile-title-text">Пароль</p>
                        </div>
                        <div class="empty-field">
                            <p class="text-field">Сменить пароль</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- блок с прочими настройками -->

    <div class="other-settings">
        <div class="container">
            <div class="div-settings">
                <div class="settings-title-div">
                    <p class="settings-title">Прочие настройки</p>
                </div>
                <div class="subscribtion">
                    <p class="subscribtion-text">Продлевать подписку автоматически</p>
                    <label class="checkbox-ios">
                        <input type="checkbox">
                        <span class="checkbox-ios-switch"></span>
                    </label>
                </div>
                <div class="subscribtion">
                    <p class="subscribtion-text">Публичный доступ к моей фонотеке</p>
                    <label class="checkbox-ios">
                        <input type="checkbox" checked>
                        <span class="checkbox-ios-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- скрипт для чекбоксов -->

    <script>
        $(window).keyup(function(e) {
            var target = $('.checkbox-ios input:focus');
            if (e.keyCode == 9 && $(target).length) {
                $(target).parent().addClass('focused');
            }
        });

        $('.checkbox-ios input').focusout(function() {
            $(this).parent().removeClass('focused');
        });
    </script>

    <!-- подвал -->

    <hr>

    <footer>
        <div class="container">
            <div class="footer">
                <ul class="footer-top">
                    <li class="footer-item">
                        <p class="footer-item-text">Правообладателям</p>
                    </li>
                    <li class="footer-item">
                        <p class="footer-item-text">Пользовательское соглашение</p>
                    </li>
                    <li class="footer-item">
                        <p class="footer-item-text">Справка</p>
                    </li>
                    <li class="footer-item">
                        <p class="footer-item-text">Подписаться</p>
                    </li>
                    <li class="footer-item">
                        <p class="footer-item-text footer-item-ebassol">© 2023 ООО «ebassol»</p>
                    </li>
                </ul>
                <ul class="footer-bottom">
                    <li class="footer-item">
                        <p class="footer-item-text footer-item-ebassol gray-ebassol">Сервис ebassol может содержать
                            информацию, не предназначенную для несовершеннолетних</p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <div class="player-fixed">
        <div class="container-player">
            <div class="progressbar"></div>
        </div>
        <div class="container container-player-none">
            <div class="player-items">
                <div class="player-action-buttons">
                    <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-hover-orange" d="M0.00505447 21.012V0.936631L0.00469398 0.934796L0.00505447 0.932962V0.846747H0.0137196C0.0346584 0.616784 0.139238 0.403022 0.30702 0.247247C0.474802 0.0914715 0.693722 0.00488178 0.920988 0.00440288C0.931818 0.00440288 0.941927 0.00733746 0.952396 0.00770433H2.60194C2.62757 0.00550308 2.65248 0 2.67884 0C2.92173 9.72319e-05 3.15465 0.0981903 3.3264 0.272721C3.49814 0.447251 3.59468 0.683938 3.59477 0.930761C3.59477 0.973685 3.58791 1.01514 3.58213 1.0566V9.54644L15.6192 2.48411C15.705 2.39789 15.8138 2.33904 15.9321 2.3148C16.0504 2.29056 16.1731 2.30198 16.2851 2.34766C16.3971 2.39335 16.4936 2.4713 16.5625 2.57193C16.6315 2.67256 16.6701 2.79149 16.6734 2.91408H16.6756V8.50855L26.944 2.48374C27.0298 2.39752 27.1386 2.33867 27.2569 2.31443C27.3752 2.29019 27.4979 2.30161 27.6099 2.3473C27.7219 2.39298 27.8183 2.47093 27.8873 2.57156C27.9563 2.6722 27.9948 2.79112 27.9982 2.91372H28V19.0676C27.9998 19.1928 27.9629 19.3152 27.894 19.4191C27.8251 19.5229 27.7273 19.6035 27.6131 19.6507C27.4989 19.6978 27.3735 19.7093 27.2528 19.6836C27.1321 19.658 27.0217 19.5964 26.9357 19.5067L16.6756 13.487V19.0679C16.6754 19.1932 16.6385 19.3156 16.5696 19.4194C16.5007 19.5233 16.4029 19.6039 16.2887 19.651C16.1745 19.6982 16.049 19.7096 15.9284 19.684C15.8077 19.6584 15.6973 19.5968 15.6113 19.5071L3.58213 12.4495V21.0278H3.57744C3.57816 21.0421 3.58177 21.0553 3.58177 21.0696C3.58168 21.3161 3.48538 21.5524 3.31401 21.7269C3.14264 21.9013 2.91019 21.9995 2.66765 22H0.915934V21.9912C0.79565 21.9912 0.676546 21.9671 0.56542 21.9203C0.454294 21.8736 0.353323 21.805 0.26827 21.7186C0.18322 21.6322 0.115751 21.5295 0.0697212 21.4166C0.0236912 21.3037 0 21.1827 0 21.0604C0.000360489 21.0436 0.0043335 21.0281 0.00505447 21.012Z" fill="white" />
                    </svg>
                    <svg width="18" height="24" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-hover-orange" d="M17.6545 12.3869L1.20583 23.3527C1.08898 23.4305 0.95323 23.4751 0.813032 23.4818C0.672834 23.4885 0.533442 23.4571 0.409703 23.3908C0.285963 23.3246 0.18251 23.226 0.110362 23.1056C0.0382135 22.9852 7.25059e-05 22.8475 0 22.7071V0.775555C7.25059e-05 0.635196 0.0382135 0.497486 0.110362 0.377091C0.18251 0.256696 0.285963 0.158124 0.409703 0.091875C0.533442 0.0256258 0.672834 -0.00582023 0.813032 0.0008865C0.95323 0.00759323 1.08898 0.0522018 1.20583 0.12996L17.6545 11.0958C17.7608 11.1666 17.8479 11.2626 17.9082 11.3752C17.9685 11.4879 18 11.6136 18 11.7413C18 11.8691 17.9685 11.9948 17.9082 12.1075C17.8479 12.2201 17.7608 12.3161 17.6545 12.3869Z" fill="white" />
                    </svg>
                    <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-hover-orange" d="M27.9949 20.6772V0.921708L27.9953 0.919903L27.9949 0.918098V0.833256H27.9863C27.9653 0.606957 27.8608 0.396601 27.693 0.243308C27.5252 0.0900142 27.3063 0.004804 27.079 0.00433273C27.0682 0.00433273 27.0581 0.00722056 27.0476 0.00758159H25.3981C25.3724 0.00541541 25.3475 0 25.3212 0C25.0783 9.56828e-05 24.8454 0.096626 24.6736 0.268376C24.5019 0.440126 24.4053 0.673041 24.4052 0.915932C24.4052 0.958172 24.4121 0.998969 24.4179 1.03977V9.39435L12.3808 2.44453C12.295 2.35968 12.1862 2.30177 12.0679 2.27792C11.9496 2.25406 11.8269 2.2653 11.7149 2.31026C11.6029 2.35521 11.5064 2.43192 11.4375 2.53095C11.3685 2.62998 11.3299 2.74701 11.3266 2.86766H11.3244V8.373L1.05601 2.44417C0.970179 2.35932 0.861422 2.30141 0.743114 2.27756C0.624806 2.2537 0.502105 2.26494 0.390101 2.3099C0.278097 2.35485 0.181672 2.43156 0.112686 2.53059C0.0437003 2.62962 0.00516007 2.74665 0.00180519 2.8673H0V18.7638C0.000173974 18.887 0.0370717 19.0075 0.105984 19.1097C0.174896 19.2119 0.272697 19.2912 0.386905 19.3376C0.501114 19.384 0.626549 19.3953 0.747203 19.37C0.867858 19.3448 0.978258 19.2842 1.06431 19.1959L11.3244 13.2722V18.7641C11.3246 18.8874 11.3615 19.0078 11.4304 19.11C11.4993 19.2122 11.5971 19.2916 11.7113 19.338C11.8255 19.3843 11.951 19.3956 12.0716 19.3704C12.1923 19.3452 12.3027 19.2846 12.3887 19.1963L24.4179 12.2512V20.6928H24.4226C24.4218 20.7068 24.4182 20.7198 24.4182 20.7339C24.4183 20.9765 24.5146 21.2091 24.686 21.3807C24.8574 21.5524 25.0898 21.649 25.3324 21.6495H27.0841V21.6408C27.2043 21.6408 27.3235 21.6171 27.4346 21.5711C27.5457 21.5251 27.6467 21.4576 27.7317 21.3726C27.8168 21.2875 27.8842 21.1865 27.9303 21.0754C27.9763 20.9643 28 20.8452 28 20.7249C27.9996 20.7083 27.9957 20.6931 27.9949 20.6772Z" fill="white" />
                    </svg>
                </div>
                <div class="div-player-icon">
                    <a class="player-icon-img"><img src="./images/player_icon.png" alt="player-icon"></a>
                </div>
                <div class="track-info">
                    <p class="track-name">Я любил её, а она меня кинула</p>
                    <div class="music-and-time">
                        <p class="musician-name">pinkpagejpeg666</p>
                        <p class="track-time-player">2:59</p>
                    </div>
                </div>
                <div class="icons-player">
                    <svg class="plus_white_player" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-hover-orange" d="M25 14.2857H14.2857V25H10.7143V14.2857H0V10.7143H10.7143V0H14.2857V10.7143H25V14.2857Z" fill="#F0F0F0" />
                    </svg>
                    <svg class="cancel_player" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-hover-orange" d="M12.5 0C5.5971 0 0 5.5971 0 12.5C0 19.4029 5.5971 25 12.5 25C19.4029 25 25 19.4029 25 12.5C25 5.5971 19.4029 0 12.5 0ZM12.5 22.8795C6.76897 22.8795 2.12054 18.231 2.12054 12.5C2.12054 10.0167 2.99386 7.73438 4.45033 5.94866L19.0513 20.5497C17.2656 22.0061 14.9833 22.8795 12.5 22.8795ZM20.5497 19.0513L5.94866 4.45033C7.73438 2.99386 10.0167 2.12054 12.5 2.12054C18.231 2.12054 22.8795 6.76897 22.8795 12.5C22.8795 14.9833 22.0061 17.2656 20.5497 19.0513Z" fill="white" />
                    </svg>
                    <svg class="voice_player" width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-hover-orange" d="M5.98454 16.2337L6.42398 15.5001L6.2205 15.3805H5.98454V16.2337ZM5.98454 5.9813V6.83624H6.2205L6.42569 6.71484L5.98454 5.9813ZM14.5339 0.855114H15.3888C15.3889 0.703849 15.3488 0.555284 15.2726 0.424581C15.1965 0.293878 15.087 0.185716 14.9554 0.111137C14.8238 0.0365566 14.6748 -0.00177183 14.5235 6.29075e-05C14.3723 0.00189764 14.2242 0.0438299 14.0945 0.12158L14.5339 0.855114ZM14.5339 21.3599L14.0945 22.0934C14.2242 22.1712 14.3723 22.2131 14.5235 22.2149C14.6748 22.2168 14.8238 22.1784 14.9554 22.1038C15.087 22.0293 15.1965 21.9211 15.2726 21.7904C15.3488 21.6597 15.3889 21.5111 15.3888 21.3599H14.5339ZM19.5609 8.08615L18.9556 7.48257L17.7467 8.69145L18.352 9.29674L19.5609 8.08615ZM23.1858 14.1288L23.7911 14.7324L25 13.5235L24.3947 12.92L23.1858 14.1288ZM24.3964 9.29674L25 8.69145L23.7911 7.48257L23.1875 8.08615L24.3964 9.29674ZM18.352 12.92L17.7467 13.5235L18.9556 14.7324L19.5609 14.1288L18.352 12.92ZM5.98454 15.3805L2.5648 15.3787V17.0886H5.98454V15.3805ZM2.5648 15.3787C2.45247 15.379 2.3412 15.357 2.23737 15.3141C2.13354 15.2712 2.0392 15.2083 1.95977 15.1288C1.88034 15.0494 1.81737 14.9551 1.77449 14.8512C1.7316 14.7474 1.70964 14.6361 1.70987 14.5238H0C0 15.943 1.14732 17.0886 2.5648 17.0886V15.3787ZM1.70987 14.5238V7.69117H0V14.5272H1.70987V14.5238ZM1.70987 7.69117C1.70987 7.21925 2.09117 6.83624 2.5648 6.83624V5.12637C1.14732 5.12637 0 6.27198 0 7.69117H1.70987ZM2.5648 6.83624H5.98454V5.12637H2.5648V6.83624ZM6.42569 6.71484L14.9733 1.58865L14.0945 0.12158L5.54511 5.24777L6.42569 6.71484ZM13.679 0.855114V21.3599H15.3888V0.855114H13.679ZM14.9733 20.6263L6.42398 15.5001L5.54511 16.9672L14.0945 22.0934L14.9733 20.6263ZM18.352 9.29674L23.1858 14.1288L24.3947 12.92L19.5609 8.08615L18.352 9.29674ZM23.1875 8.08615L18.352 12.92L19.5609 14.1288L24.3964 9.29674L23.1875 8.08615Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

</body>

</html>