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

if (isset($_POST['favorite_photo'])) {
    $playlistname = $_POST['favorite_photo'];
    if ($playlistname === '') {
        unset($playlistname);
    }
}

if (isset($_POST['login'])) {
    $playlistphoto = $_POST['login'];
    if ($playlistphoto === '') {
        unset($playlistphoto);
    }
}

$playlistname = trim($_POST['favorite_photo']);
$playlistphoto = trim($_POST['login']);

$qCreateTrack = "INSERT INTO favorite (`favorite_photo`,`ID_users`) VALUES ('$playlistname','$playlistphoto')";
addslashes($qCreateTrack);
$resCreateTrack = mysqli_query($connect, $qCreateTrack) or die(mysqli_error($connect));

header("location: ./favorite-panel.php");
?>

