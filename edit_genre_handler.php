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

if(isset($_GET['idA'])) {
    $playlist = $_GET['idA'];
}

if (isset($_POST['genre'])) {
    $playlistname = $_POST['genre'];
    if ($playlistname === '') {
        unset($playlistname);
    }
}

$playlistname = trim($_POST['genre']);

$queryplaylist = "UPDATE `genre` SET `genre` = '$playlistname' WHERE `ID_genre` = '$playlist'";
addslashes($queryplaylist);
$resPlaylist = mysqli_query($connect, $queryplaylist) or die(mysqli_error($connect));

header("location: ./genre-panel.php");
?>

