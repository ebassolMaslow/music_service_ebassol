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

if (isset($_POST['playlists'])) {
    $playlists = $_POST['playlists'];
    if ($playlists === '') {
        unset($playlists);
    }
}

if (isset($_POST['track'])) {
    $track = $_POST['track'];
    if ($track === '') {
        unset($track);
    }
}

$playlists = trim($_POST['playlists']);
$track = trim($_POST['track']);

$qCreateTrack = "INSERT INTO adding_to_a_playlist (`ID_playlists`,`ID_track`) VALUES ('$playlists','$track')";
addslashes($qCreateTrack);
$resCreateTrack = mysqli_query($connect, $qCreateTrack) or die(mysqli_error($connect));

header("location: ./adding_to_a_playlist-panel.php");
