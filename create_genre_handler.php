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

if (isset($_POST['genre'])) {
    $playlistname = $_POST['genre'];
    if ($playlistname === '') {
        unset($playlistname);
    }
}

$playlistname = trim($_POST['genre']);

$qCreateTrack = "INSERT INTO genre (`genre`) VALUES ('$playlistname')";
addslashes($qCreateTrack);
$resCreateTrack = mysqli_query($connect, $qCreateTrack) or die(mysqli_error($connect));

header("location: ./genre-panel.php");
?>

