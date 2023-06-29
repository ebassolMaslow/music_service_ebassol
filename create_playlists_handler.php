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

if (isset($_POST['playlist_name'])) {
    $playlistname = $_POST['playlist_name'];
    if ($playlistname === '') {
        unset($playlistname);
    }
}

if (isset($_POST['playlist_photo'])) {
    $playlistphoto = $_POST['playlist_photo'];
    if ($playlistphoto === '') {
        unset($playlistphoto);
    }
}

if (isset($_POST['login'])) {
    $IDusers = $_POST['login'];
    if ($IDusers === '') {
        unset($IDusers);
    }
}

$playlistname = trim($_POST['playlist_name']);
$playlistphoto = trim($_POST['playlist_photo']);
$IDusers = trim($_POST['login']);

$qCreateTrack = "INSERT INTO playlists (`playlist_name`,`playlist_photo`,`ID_users`) VALUES ('$playlistname','$playlistphoto','$IDusers')";
addslashes($qCreateTrack);
$resCreateTrack = mysqli_query($connect, $qCreateTrack) or die(mysqli_error($connect));

header("location: ./playlists-panel.php");
?>

